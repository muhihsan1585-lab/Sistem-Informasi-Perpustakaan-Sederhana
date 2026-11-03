@extends('layouts.app')

@section('title', 'Dashboard Admin')

@section('content')
<h2 class="page-title">Dashboard Admin</h2>
<p class="page-description">
    Selamat datang, {{ Auth::user()->name }}. Kelola sistem informasi perpustakaan melalui menu yang tersedia.
</p>

<div class="dashboard-card">
    <h3>Selamat Datang, Admin!</h3>
    <p>Anda login sebagai {{ Auth::user()->role }}.</p>
</div>
@endsection