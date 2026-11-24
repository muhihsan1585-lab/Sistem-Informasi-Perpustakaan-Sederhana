@extends('layouts.app')

@section('title', 'Dashboard Petugas')

@section('content')
<h2 class="page-title">Dashboard Petugas</h2>
<p class="page-description">
    Selamat datang, {{ Auth::user()->name }}. Silakan gunakan menu untuk mengelola aktivitas perpustakaan.
</p>

<div class="stats-grid">
    <div class="stat-card">
        <span class="stat-label">Jumlah Judul Buku</span>
        <strong class="stat-value">{{ $totalBookTitles }}</strong>
        <span class="stat-hint">Total koleksi judul terdaftar</span>
    </div>

    <div class="stat-card">
        <span class="stat-label">Total Stok Buku Tersedia</span>
        <strong class="stat-value">{{ $totalAvailableStock }}</strong>
        <span class="stat-hint">Eksemplar siap dipinjam</span>
    </div>

    <div class="stat-card">
        <span class="stat-label">Jumlah Anggota Perpustakaan</span>
        <strong class="stat-value">{{ $totalMembers }}</strong>
        <span class="stat-hint">Anggota aktif terdaftar</span>
    </div>

    <div class="stat-card">
        <span class="stat-label">Buku Sedang Dipinjam</span>
        <strong class="stat-value">{{ $totalBorrowedBooks }}</strong>
        <span class="stat-hint">Eksemplar dalam peminjaman aktif</span>
    </div>
</div>

<div class="dashboard-card">
    <h3>Selamat Datang, Petugas!</h3>
    <p>Anda login sebagai <span class="badge badge-petugas">{{ ucfirst(Auth::user()->role) }}</span>.</p>
</div>
@endsection