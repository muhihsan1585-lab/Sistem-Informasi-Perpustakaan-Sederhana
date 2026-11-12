@extends('layouts.app')

@section('title', 'Tambah Buku')

@section('content')
<h2 class="page-title">Tambah Buku</h2>
<p class="page-description">Masukkan informasi buku baru.</p>

<div class="dashboard-card form-card">
    <form action="{{ route('books.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="title">Judul Buku</label>
            <input type="text" id="title" name="title"
                value="{{ old('title') }}" required>
            @error('title')
            <small class="error-text">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="author">Penulis</label>
            <input type="text" id="author" name="author"
                value="{{ old('author') }}" required>
            @error('author')
            <small class="error-text">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="category_id">Kategori</label>
            <select id="category_id" name="category_id" required>
                <option value="">-- Pilih Kategori --</option>
                @foreach($categories as $category)
                <option value="{{ $category->id }}"
                    {{ old('category_id') == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
                @endforeach
            </select>
            @error('category_id')
            <small class="error-text">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="publisher">Penerbit</label>
            <input type="text" id="publisher" name="publisher"
                value="{{ old('publisher') }}">
            @error('publisher')
            <small class="error-text">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="year">Tahun Terbit</label>
            <input type="number" id="year" name="year"
                value="{{ old('year') }}" min="1000" max="{{ date('Y') }}">
            @error('year')
            <small class="error-text">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="stock">Stok Buku</label>
            <input type="number" id="stock" name="stock"
                value="{{ old('stock', 0) }}" min="0" required>
            @error('stock')
            <small class="error-text">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-actions">
            <a href="{{ route('books.index') }}" class="btn-secondary">Kembali</a>
            <button type="submit" class="btn-primary">Simpan Buku</button>
        </div>
    </form>
</div>
@endsection