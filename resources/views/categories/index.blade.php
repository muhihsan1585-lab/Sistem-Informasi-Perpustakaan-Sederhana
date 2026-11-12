@extends('layouts.app')

@section('title', 'Data Kategori')

@section('content')
<div class="page-header">
    <div>
        <h2 class="page-title">Data Kategori</h2>
        <p class="page-description">Kelola kategori buku perpustakaan.</p>
    </div>
    <a href="{{ route('categories.create') }}" class="btn-primary">+ Tambah Kategori</a>
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
                <th>Nama Kategori</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($categories as $category)
            <tr>
                <td>{{ $categories->firstItem() + $loop->index }}</td>
                <td>{{ $category->name }}</td>
                <td>{{ $category->description ?? '-' }}</td>
                <td class="action-buttons">
                    <a href="{{ route('categories.edit', $category->id) }}" class="btn-edit">Edit</a>
                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus kategori ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-delete">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="empty-data">Belum ada data kategori.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="pagination">
        {{ $categories->links() }}
    </div>
</div>
@endsection