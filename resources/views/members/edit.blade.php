@extends('layouts.app')

@section('title', 'Edit Anggota')

@section('content')

<div class="page-header">
    <div>
        <h2 class="page-title">Edit Anggota</h2>
        <p class="page-description">
            Perbarui informasi anggota perpustakaan.
        </p>
    </div>

    <a href="{{ route('members.index') }}"
        class="btn-secondary">
        Kembali
    </a>
</div>

<div class="dashboard-card form-card">

    <form action="{{ route('members.update', $member) }}"
        method="POST">

        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="code">Kode Anggota</label>
            <input type="text"
                id="code"
                name="code"
                value="{{ old('code', $member->code) }}"
                required>

            @error('code')
            <small class="error-text">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="name">Nama Lengkap</label>
            <input type="text"
                id="name"
                name="name"
                value="{{ old('name', $member->name) }}"
                required>

            @error('name')
            <small class="error-text">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email"
                id="email"
                name="email"
                value="{{ old('email', $member->email) }}"
                required>

            @error('email')
            <small class="error-text">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="phone">Nomor Telepon</label>
            <input type="text"
                id="phone"
                name="phone"
                value="{{ old('phone', $member->phone) }}">
        </div>

        <div class="form-group">
            <label for="address">Alamat</label>
            <textarea id="address"
                name="address"
                rows="4">{{ old('address', $member->address) }}</textarea>
        </div>

        <div class="form-actions">
            <a href="{{ route('members.index') }}"
                class="btn-secondary">
                Batal
            </a>

            <button type="submit" class="btn-primary">
                Simpan Perubahan
            </button>
        </div>

    </form>
</div>

@endsection