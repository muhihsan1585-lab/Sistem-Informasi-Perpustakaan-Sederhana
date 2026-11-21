@extends('layouts.app')

@section('title', 'Detail Peminjaman')

@section('content')

<div class="page-header">
    <div>
        <h2 class="page-title">
            Detail Peminjaman #{{ $borrowing->id }}
        </h2>
        <p class="page-description">
            Informasi transaksi peminjaman buku perpustakaan.
        </p>
    </div>

    <a href="{{ route('borrowings.index') }}"
        class="btn-secondary">
        Kembali
    </a>
</div>

@if(session('success'))
<div class="alert-success">
    {{ session('success') }}
</div>
@endif

@if($errors->any())
<div class="alert-error">
    {{ $errors->first() }}
</div>
@endif

<div class="dashboard-card detail-card">

    <div class="detail-card-header">
        <div>
            <h3>Informasi Peminjaman</h3>
            <p>Transaksi #{{ $borrowing->id }}</p>
        </div>

        @if($borrowing->status === 'borrowed')
        <span class="borrowing-status borrowed">
            Sedang Dipinjam
        </span>
        @elseif($borrowing->status === 'returned')
        <span class="borrowing-status returned">
            Sudah Dikembalikan
        </span>
        @endif
    </div>

    <div class="detail-grid">
        <div class="detail-field">
            <span>Nama Anggota</span>
            <strong>{{ $borrowing->member?->name ?? '-' }}</strong>
        </div>

        <div class="detail-field">
            <span>Admin / Petugas</span>
            <strong>{{ $borrowing->user?->name ?? '-' }}</strong>
        </div>

        <div class="detail-field">
            <span>Tanggal Peminjaman</span>
            <strong>
                {{ $borrowing->borrow_date
                    ? \Carbon\Carbon::parse($borrowing->borrow_date)->format('d M Y')
                    : '-' }}
            </strong>
        </div>

        <div class="detail-field">
            <span>Jatuh Tempo</span>
            <strong>
                {{ $borrowing->due_date
                    ? \Carbon\Carbon::parse($borrowing->due_date)->format('d M Y')
                    : '-' }}
            </strong>
        </div>

        <div class="detail-field">
            <span>Tanggal Pengembalian</span>
            <strong>
                {{ $borrowing->return_date
                    ? \Carbon\Carbon::parse($borrowing->return_date)->format('d M Y')
                    : 'Belum Dikembalikan' }}
            </strong>
        </div>

        <div class="detail-field">
            <span>Jumlah Judul Buku</span>
            <strong>{{ $borrowing->books->count() }} Judul</strong>
        </div>
    </div>

    <h3 class="detail-section-title">Daftar Buku yang Dipinjam</h3>

    <div style="overflow-x: auto;">
        <table class="data-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul Buku</th>
                    <th>Penulis</th>
                </tr>
            </thead>
            <tbody>
                @forelse($borrowing->books as $book)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->author ?? '-' }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="empty-data">
                        Tidak ada detail buku.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="form-actions">
        <a href="{{ route('borrowings.index') }}"
            class="btn-secondary">
            Kembali
        </a>

        @if($borrowing->status === 'borrowed')
        <form action="{{ route('borrowings.return', $borrowing) }}"
            method="POST"
            onsubmit="return confirm('Yakin ingin mengembalikan seluruh buku dalam transaksi ini?')">

            @csrf
            @method('PATCH')

            <button type="submit" class="btn-primary">
                Proses Pengembalian
            </button>
        </form>
        @endif
    </div>

</div>

@endsection