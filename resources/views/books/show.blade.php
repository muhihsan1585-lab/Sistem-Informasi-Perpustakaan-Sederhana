@extends('layouts.app')

@section('title', 'Detail Buku')

@section('content')
<h2 class="page-title">Detail Buku</h2>
<p class="page-description">Informasi lengkap buku perpustakaan.</p>

<div class="dashboard-card form-card">
    <table class="data-table">
        <tr>
            <th>Judul Buku</th>
            <td>{{ $book->title }}</td>
        </tr>
        <tr>
            <th>Penulis</th>
            <td>{{ $book->author }}</td>
        </tr>
        <tr>
            <th>Kategori</th>
            <td>{{ $book->category->name ?? '-' }}</td>
        </tr>
        <tr>
            <th>Penerbit</th>
            <td>{{ $book->publisher ?? '-' }}</td>
        </tr>
        <tr>
            <th>Tahun Terbit</th>
            <td>{{ $book->year ?? '-' }}</td>
        </tr>
        <tr>
            <th>Stok</th>
            <td>{{ $book->stock }}</td>
        </tr>
    </table>

    <div class="form-actions" style="margin-top: 20px;">
        <a href="{{ route('books.index') }}" class="btn-secondary">Kembali</a>
        <a href="{{ route('books.edit', $book->id) }}" class="btn-primary">Edit Buku</a>
    </div>
</div>
@endsection