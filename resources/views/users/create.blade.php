@extends('layouts.app')

@section('title', 'Tambah User')

@section('content')
<h2 class="page-title">Tambah User</h2>
<p class="page-description">Buat akun baru untuk admin atau petugas.</p>

<div class="dashboard-card form-card">
    <form action="{{ route('users.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="name">Nama</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required>
            @error('name')
            <small class="error-text">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required>
            @error('email')
            <small class="error-text">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="role">Role</label>
            <select id="role" name="role" required>
                <option value="">-- Pilih Role --</option>
                <option value="admin" @selected(old('role') === 'admin')>Admin</option>
                <option value="petugas" @selected(old('role') === 'petugas')>Petugas</option>
            </select>
            @error('role')
            <small class="error-text">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
            <small class="form-hint">Minimal 8 karakter.</small>
            @error('password')
            <small class="error-text">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="password_confirmation">Konfirmasi Password</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required>
        </div>

        <div class="form-actions">
            <a href="{{ route('users.index') }}" class="btn-secondary">Kembali</a>
            <button type="submit" class="btn-primary">Simpan User</button>
        </div>
    </form>
</div>
@endsection