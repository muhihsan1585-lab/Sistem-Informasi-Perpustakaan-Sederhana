@extends('layouts.app')

@section('title', 'Data Buku')

@section('content')

<div class="page-header">
    <div>
        <h2 class="page-title">Data Buku</h2>
        <p class="page-description">
            Kelola koleksi dan pantau peminjaman buku perpustakaan.
        </p>
    </div>

    <a href="{{ route('books.create') }}" class="btn-primary">
        + Tambah Buku
    </a>
</div>

@if(session('success'))
<div class="alert-success">
    {{ session('success') }}
</div>
@endif

@if(session('error'))
<div class="alert-error">
    {{ session('error') }}
</div>
@endif

<div class="dashboard-card">
    <div style="overflow-x: auto;">
        <table class="data-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul Buku</th>
                    <th>Penulis</th>
                    <th>Kategori</th>
                    <th>Stok Tersedia</th>
                    <th>Sedang Dipinjam</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse($books as $book)
                <tr>
                    <td>
                        {{ $books->firstItem() + $loop->index }}
                    </td>

                    <td>{{ $book->title }}</td>

                    <td>{{ $book->author }}</td>

                    <td>
                        {{ $book->category?->name ?? '-' }}
                    </td>

                    <td>
                        @if($book->stock > 0)
                        <span class="book-stock available">
                            {{ $book->stock }} Tersedia
                        </span>
                        @else
                        <span class="book-stock empty">
                            Stok Habis
                        </span>
                        @endif
                    </td>

                    <td>
                        @if($book->borrowed_count > 0)
                        <span class="book-borrowed active">
                            {{ $book->borrowed_count }} Dipinjam
                        </span>
                        @else
                        <span class="book-borrowed inactive">
                            Tidak Dipinjam
                        </span>
                        @endif
                    </td>

                    <td>
                        <div class="action-buttons">
                            <a href="{{ route('books.show', $book) }}"
                                class="btn-secondary">
                                Detail
                            </a>

                            <a href="{{ route('books.edit', $book) }}"
                                class="btn-edit">
                                Edit
                            </a>

                            <form
                                action="{{ route('books.destroy', $book) }}"
                                method="POST"
                                onsubmit="return confirm('Yakin ingin menghapus buku ini?')">

                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn-delete">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="empty-data">
                        Belum ada data buku.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="pagination">
        {{ $books->links() }}
    </div>
</div>

@endsection