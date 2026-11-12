@extends('layouts.app')

@section('title', 'Edit Kategori')

@section('content')
<h2 class="page-title">Edit Kategori</h2>
<p class="page-description">Perbarui informasi kategori buku.</p>

<div class="dashboard-card form-card">
    <form action="{{ route('categories.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Nama Kategori</label>
            <input
                type="text"
                id="name"
                name="name"
                value="{{ old('name', $category->name) }}"
                required>
            @error('name')
            <small class="error-text">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="description">Deskripsi</label>
            <textarea
                id="description"
                name="description"
                rows="4">{{ old('description', $category->description) }}</textarea>
            @error('description')
            <small class="error-text">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-actions">
            <a href="{{ route('categories.index') }}" class="btn-secondary">Kembali</a>
            <button type="submit" class="btn-primary">Simpan Perubahan</button>
        </div>
    </form>
</div>
@endsection