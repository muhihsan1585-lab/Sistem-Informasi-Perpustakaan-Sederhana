@extends('layouts.app')

@section('title', 'Tambah Peminjaman')

@section('content')

<h2 class="page-title">Tambah Peminjaman</h2>
<p class="page-description">
    Isi data anggota dan pilih buku yang akan dipinjam.
</p>

@if($errors->any())
<div class="alert-error">
    <strong>Gagal menyimpan peminjaman:</strong>
    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="dashboard-card form-card">

    <form action="{{ route('borrowings.store') }}" method="POST">
        @csrf

        {{-- Pilih anggota --}}
        <div class="form-group">
            <label for="member_id">Anggota Peminjam</label>

            <select name="member_id" id="member_id" required>
                <option value="">-- Pilih Anggota --</option>

                @foreach($members as $member)
                <option value="{{ $member->id }}"
                    @selected(old('member_id')==$member->id)>
                    {{ $member->name }} ({{ $member->code }})
                </option>
                @endforeach
            </select>

            @error('member_id')
            <small class="error-text">{{ $message }}</small>
            @enderror
        </div>

        {{-- Pilih buku --}}
        <div class="form-group">
            <label>Pilih Buku yang Dipinjam</label>

            <div class="borrowing-book-list">
                @forelse($books as $book)
                <label class="borrowing-book-item">
                    <input
                        type="checkbox"
                        name="book_ids[]"
                        value="{{ $book->id }}"
                        @checked(in_array($book->id, old('book_ids', [])))
                    >

                    <span>
                        <strong>{{ $book->title }}</strong>
                        <small>
                            Penulis: {{ $book->author }}
                            | Stok: {{ $book->stock }}
                        </small>
                    </span>
                </label>
                @empty
                <p>Belum ada buku yang tersedia.</p>
                @endforelse
            </div>

            @error('book_ids')
            <small class="error-text">{{ $message }}</small>
            @enderror
        </div>

        {{-- Informasi --}}
        <div class="borrowing-info">
            <p>
                <strong>Tanggal Pinjam:</strong>
                {{ now()->format('d-m-Y') }}
            </p>

            <p>
                <strong>Jatuh Tempo:</strong>
                {{ now()->addDays(7)->format('d-m-Y') }}
            </p>

            <p>
                <strong>Petugas:</strong>
                {{ auth()->user()->name }}
            </p>
        </div>

        {{-- Tombol --}}
        <div class="form-actions">
            <a href="{{ route('borrowings.index') }}"
                class="btn-secondary">
                Kembali
            </a>

            <button type="submit" class="btn-primary">
                Simpan Peminjaman
            </button>
        </div>
    </form>
</div>

@endsection