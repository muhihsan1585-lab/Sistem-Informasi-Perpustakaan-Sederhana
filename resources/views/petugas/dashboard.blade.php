@extends('layouts.app')

@section('title', 'Dashboard Petugas')

@section('content')
<h2 class="page-title">Dashboard Petugas</h2>
<p class="page-description">
    Selamat datang, {{ Auth::user()->name }}. Silakan gunakan menu untuk mengelola aktivitas perpustakaan.
</p>

<div class="dashboard-card">
    <h3>Selamat Datang, Petugas!</h3>
    <p>Anda login sebagai {{ Auth::user()->role }}.</p>
</div>
@endsection