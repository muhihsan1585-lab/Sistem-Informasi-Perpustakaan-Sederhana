@extends('layouts.app')

@section('title', 'Data Peminjaman')

@section('content')

{{-- HEADER HALAMAN --}}
<div class="page-header">
    <div>
        <h2 class="page-title">Data Peminjaman</h2>
        <p class="page-description">
            Kelola transaksi peminjaman dan pengembalian buku perpustakaan.
        </p>
    </div>

    <a href="{{ route('borrowings.create') }}" class="btn-primary">
        + Tambah Peminjaman
    </a>
</div>

{{-- PESAN BERHASIL --}}
@if(session('success'))
<div class="alert-success">
    {{ session('success') }}
</div>
@endif

{{-- PESAN ERROR --}}
@if(session('error'))
<div class="alert-error">
    {{ session('error') }}
</div>
@endif

@if($errors->any())
<div class="alert-error">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

{{-- TABEL PEMINJAMAN --}}
<div class="dashboard-card">

    <div style="overflow-x: auto;">

        <table class="data-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Anggota</th>
                    <th>Petugas</th>
                    <th>Tanggal Pinjam</th>
                    <th>Jatuh Tempo</th>
                    <th>Tanggal Kembali</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse($borrowings as $borrowing)
                <tr>
                    <td>
                        {{ $borrowings->firstItem() + $loop->index }}
                    </td>

                    <td>
                        {{ $borrowing->member->name ?? '-' }}
                    </td>

                    <td>
                        {{ $borrowing->user->name ?? '-' }}
                    </td>

                    <td>
                        {{ $borrowing->borrow_date
                                ? \Carbon\Carbon::parse($borrowing->borrow_date)->format('d-m-Y')
                                : '-' }}
                    </td>

                    <td>
                        {{ $borrowing->due_date
                                ? \Carbon\Carbon::parse($borrowing->due_date)->format('d-m-Y')
                                : '-' }}
                    </td>

                    <td>
                        {{ $borrowing->return_date
                                ? \Carbon\Carbon::parse($borrowing->return_date)->format('d-m-Y')
                                : 'Belum Kembali' }}
                    </td>


                    <td>
                        @if($borrowing->status === 'borrowed')
                        <span class="borrowing-status borrowed">
                            ● Sedang Dipinjam
                        </span>

                        @elseif($borrowing->status === 'returned')
                        <span class="borrowing-status returned">
                            ✓ Dikembalikan
                        </span>

                        @else
                        <span class="borrowing-status">
                            {{ ucfirst($borrowing->status) }}
                        </span>
                        @endif
                    </td>


                    <td>
                        <div class="action-buttons">

                            {{-- DETAIL --}}
                            <a href="{{ route('borrowings.show', $borrowing->id) }}"
                                class="btn-secondary">
                                Detail
                            </a>

                            {{-- PENGEMBALIAN --}}
                            @if($borrowing->status === 'borrowed')

                            <form
                                action="{{ route('borrowings.return', $borrowing->id) }}"
                                method="POST"
                                onsubmit="return confirm('Yakin ingin mengembalikan buku ini?')">

                                @csrf
                                @method('PATCH')

                                <button type="submit" class="btn-edit">
                                    Kembalikan
                                </button>
                            </form>

                            @endif

                        </div>
                    </td>
                </tr>

                @empty
                <tr>
                    <td colspan="8" class="empty-data">
                        Belum ada transaksi peminjaman.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>

    </div>

    {{-- PAGINATION --}}
    <div class="pagination">
        {{ $borrowings->links() }}
    </div>

</div>

@endsection