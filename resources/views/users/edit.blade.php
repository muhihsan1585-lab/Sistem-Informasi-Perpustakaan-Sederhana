@extends('layouts.app')

@section('title', 'Edit User')

@section('content')
<h2 class="page-title">Edit User</h2>
<p class="page-description">Perbarui data akun dan role pengguna.</p>

@if(session('error'))
<div class="alert-error">{{ session('error') }}</div>
@endif

<div class="dashboard-card form-card">
    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Nama</label>
            <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" required>
            @error('name')
            <small class="error-text">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" required>
            @error('email')
            <small class="error-text">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="role">Role</label>
            <select id="role" name="role" required>
                <option value="admin" @selected(old('role', $user->role) === 'admin')>Admin</option>
                <option value="petugas" @selected(old('role', $user->role) === 'petugas')>Petugas</option>
            </select>
            @error('role')
            <small class="error-text">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="password">Password Baru</label>
            <input type="password" id="password" name="password">
            <small class="form-hint">Kosongkan jika tidak ingin mengganti password.</small>
            @error('password')
            <small class="error-text">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="password_confirmation">Konfirmasi Password Baru</label>
            <input type="password" id="password_confirmation" name="password_confirmation">
        </div>

        <div class="form-actions">
            <a href="{{ route('users.index') }}" class="btn-secondary">Kembali</a>
            <button type="submit" class="btn-primary">Simpan Perubahan</button>
        </div>
    </form>
</div>
@endsection