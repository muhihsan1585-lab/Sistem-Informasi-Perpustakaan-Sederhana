<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrowing;
use App\Models\Member;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // 1. Jumlah judul buku
        $totalBookTitles = Book::count();

        // 2. Total stok buku yang tersedia
        $totalAvailableStock = Book::sum('stock');

        // 3. Jumlah anggota perpustakaan
        $totalMembers = Member::count();

        // 4. Jumlah buku yang sedang dipinjam (status 'borrowed' melalui tabel pivot)
        $borrowedPivotTable = (new Borrowing())->books()->getTable();
        $totalBorrowedBooks = DB::table($borrowedPivotTable)
            ->join('borrowings', 'borrowings.id', '=', "{$borrowedPivotTable}.borrowing_id")
            ->where('borrowings.status', 'borrowed')
            ->count();

        $data = compact(
            'totalBookTitles',
            'totalAvailableStock',
            'totalMembers',
            'totalBorrowedBooks'
        );

        if (Auth::user()->role === 'admin') {
            return view('admin.dashboard', $data);
        }

        return view('petugas.dashboard', $data);
    }
}