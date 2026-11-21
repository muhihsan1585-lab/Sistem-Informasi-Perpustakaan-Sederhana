<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrowing;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;

class BorrowingController extends Controller
{
    // Menampilkan seluruh transaksi
    public function index()
    {
        $borrowings = Borrowing::with(['user', 'member', 'books'])
            ->latest()
            ->paginate(10);

        return view('borrowings.index', compact('borrowings'));
    }

    // Menampilkan form peminjaman
    public function create()
    {
        $members = Member::orderBy('name')->get();

        $books = Book::where('stock', '>', 0)
            ->orderBy('title')
            ->get();

        return view('borrowings.create', compact('members', 'books'));
    }

    // Menyimpan transaksi peminjaman
    public function store(Request $request)
    {
        $validated = $request->validate([
            'member_id' => 'required|exists:members,id',
            'book_ids' => 'required|array|min:1',
            'book_ids.*' => 'required|integer|distinct|exists:books,id',
        ]);

        DB::transaction(function () use ($validated) {

            // Kunci baris buku untuk mencegah stok bentrok
            $books = Book::whereIn('id', $validated['book_ids'])
                ->orderBy('id')
                ->lockForUpdate()
                ->get();

            // Pastikan stok seluruh buku tersedia
            foreach ($books as $book) {
                if ($book->stock < 1) {
                    throw ValidationException::withMessages([
                        'book_ids' => "Stok buku {$book->title} habis.",
                    ]);
                }
            }

            $borrowDate = today();

            // Membuat transaksi utama
            $borrowing = Borrowing::create([
                'user_id' => Auth::id(),
                'member_id' => $validated['member_id'],
                'borrow_date' => $borrowDate,
                'due_date' => $borrowDate->copy()->addDays(7),
                'status' => 'borrowed',
            ]);

            // Menyimpan detail buku
            $borrowing->books()->attach($books->pluck('id')->all());

            // Mengurangi stok setiap buku
            foreach ($books as $book) {
                $book->decrement('stock');
            }
        });

        return redirect()
            ->route('borrowings.index')
            ->with('success', 'Peminjaman berhasil disimpan.');
    }

    // Menampilkan detail peminjaman
    public function show(Borrowing $borrowing)
    {
        $borrowing->load(['user', 'member', 'books']);

        return view('borrowings.show', compact('borrowing'));
    }

    // Memproses pengembalian
    public function returnBook(Borrowing $borrowing)
    {
        DB::transaction(function () use ($borrowing) {

            $borrowing = Borrowing::whereKey($borrowing->id)
                ->lockForUpdate()
                ->firstOrFail();

            // Jangan memproses pengembalian dua kali
            if ($borrowing->status === 'returned') {
                throw ValidationException::withMessages([
                    'return' => 'Buku ini sudah dikembalikan.',
                ]);
            }

            $bookIds = $borrowing->books()
                ->orderBy('books.id')
                ->pluck('books.id')
                ->all();

            // Kunci buku yang akan dikembalikan
            $books = Book::whereIn('id', $bookIds)
                ->orderBy('id')
                ->lockForUpdate()
                ->get();

            foreach ($books as $book) {
                $book->increment('stock');
            }

            $borrowing->update([
                'return_date' => today(),
                'status' => 'returned',
            ]);
        });

        return redirect()
            ->route('borrowings.index')
            ->with('success', 'Buku berhasil dikembalikan.');
    }
}
