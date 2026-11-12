@extends('layouts.app')

@section('title', 'Tambah Kategori')

@section('content')
<h2 class="page-title">Tambah Kategori</h2>
<p class="page-description">Masukkan informasi kategori buku baru.</p>

<div class="dashboard-card form-card">
    <form action="{{ route('categories.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="name">Nama Kategori</label>
            <input type="text" id="name" name="name"
                value="{{ old('name') }}"
                placeholder="Contoh: Novel"
                required>
            @error('name')
            <small class="error-text">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="description">Deskripsi</label>
            <textarea id="description" name="description"
                rows="4" placeholder="Masukkan deskripsi kategori">{{ old('description') }}</textarea>
            @error('description')
            <small class="error-text">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-actions">
            <a href="{{ route('categories.index') }}" class="btn-secondary">Kembali</a>
            <button type="submit" class="btn-primary">Simpan Kategori</button>
        </div>
    </form>
</div>
@endsection