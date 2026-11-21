@extends('layouts.app')

@section('title', 'Detail Anggota')

@section('content')

<div class="page-header">
    <div>
        <h2 class="page-title">Detail Anggota</h2>
        <p class="page-description">
            Informasi lengkap anggota perpustakaan.
        </p>
    </div>

    <a href="{{ route('members.index') }}" class="btn-secondary">
        Kembali
    </a>
</div>

<div class="dashboard-card detail-card">

    <div class="detail-card-header">
        <div class="detail-avatar">
            {{ strtoupper(substr($member->name, 0, 1)) }}
        </div>

        <div>
            <h3>{{ $member->name }}</h3>
            <p>{{ $member->code }}</p>
        </div>
    </div>

    <div class="detail-grid">
        <div class="detail-field">
            <span>Kode Anggota</span>
            <strong>{{ $member->code }}</strong>
        </div>

        <div class="detail-field">
            <span>Nama Lengkap</span>
            <strong>{{ $member->name }}</strong>
        </div>

        <div class="detail-field">
            <span>Email</span>
            <strong>{{ $member->email ?? '-' }}</strong>
        </div>

        <div class="detail-field">
            <span>Nomor Telepon</span>
            <strong>{{ $member->phone ?? '-' }}</strong>
        </div>

        <div class="detail-field">
            <span>Alamat</span>
            <strong>{{ $member->address ?? '-' }}</strong>
        </div>

        <div class="detail-field">
            <span>Terdaftar Pada</span>
            <strong>
                {{ $member->created_at?->format('d M Y H:i') ?? '-' }}
            </strong>
        </div>
    </div>

    <div class="form-actions">
        <a href="{{ route('members.index') }}"
            class="btn-secondary">
            Kembali
        </a>

        <a href="{{ route('members.edit', $member) }}"
            class="btn-primary">
            Edit Data
        </a>
    </div>

</div>

@endsection