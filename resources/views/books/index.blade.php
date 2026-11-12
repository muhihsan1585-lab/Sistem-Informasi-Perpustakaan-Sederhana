@extends('layouts.app')

@section('title', 'Data Buku')

@section('content')
<div class="page-header">
    <div>
        <h2 class="page-title">Data Buku</h2>
        <p class="page-description">Kelola koleksi buku perpustakaan.</p>
    </div>
    <a href="{{ route('books.create') }}" class="btn-primary">+ Tambah Buku</a>
</div>

@if(session('success'))
<div class="alert-success">{{ session('success') }}</div>
@endif

@if(session('error'))
<div class="alert-error">{{ session('error') }}</div>
@endif

<div class="dashboard-card">
    <table class="data-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Judul Buku</th>
                <th>Penulis</th>
                <th>Kategori</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($books as $book)
            <tr>
                <td>{{ $books->firstItem() + $loop->index }}</td>
                <td>{{ $book->title }}</td>
                <td>{{ $book->author }}</td>
                <td>{{ $book->category->name ?? '-' }}</td>
                <td>{{ $book->stock }}</td>
                <td class="action-buttons">
                    <a href="{{ route('books.show', $book->id) }}" class="btn-secondary">Detail</a>
                    <a href="{{ route('books.edit', $book->id) }}" class="btn-edit">Edit</a>
                    <form action="{{ route('books.destroy', $book->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus buku ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-delete">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="empty-data">Belum ada data buku.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="pagination">
        {{ $books->links() }}
    </div>
</div>
@endsection