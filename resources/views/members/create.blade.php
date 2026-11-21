@extends('layouts.app')

@section('title', 'Tambah Anggota')

@section('content')

<h2 class="page-title">Tambah Anggota</h2>
<p class="page-description">
    Masukkan informasi anggota perpustakaan.
</p>

<div class="dashboard-card form-card">
    <form action="{{ route('members.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="code">Kode Anggota</label>
            <input type="text" id="code" name="code"
                value="{{ old('code') }}"
                placeholder="Contoh: MBR-001" required>
            @error('code')
            <small class="error-text">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="name">Nama Lengkap</label>
            <input type="text" id="name" name="name"
                value="{{ old('name') }}"
                placeholder="Nama anggota" required>
            @error('name')
            <small class="error-text">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email"
                value="{{ old('email') }}"
                placeholder="email@example.com" required>
            @error('email')
            <small class="error-text">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="phone">Nomor Telepon</label>
            <input type="text" id="phone" name="phone"
                value="{{ old('phone') }}"
                placeholder="08123456789">
            @error('phone')
            <small class="error-text">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="address">Alamat</label>
            <textarea id="address" name="address"
                rows="3"
                placeholder="Alamat lengkap">{{ old('address') }}</textarea>
            @error('address')
            <small class="error-text">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-actions">
            <a href="{{ route('members.index') }}"
                class="btn-secondary">Kembali</a>

            <button type="submit" class="btn-primary">
                Simpan Anggota
            </button>
        </div>
    </form>
</div>

@endsection