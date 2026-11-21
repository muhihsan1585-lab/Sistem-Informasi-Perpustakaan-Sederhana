@extends('layouts.app')

@section('title', 'Daftar Anggota')

@section('content')

<div class="page-header">
    <div>
        <h2 class="page-title">Daftar Anggota</h2>
        <p class="page-description">
            Kelola data anggota perpustakaan.
        </p>
    </div>

    <a href="{{ route('members.create') }}"
        class="btn-primary">
        + Tambah Anggota
    </a>
</div>

{{-- NOTIFIKASI --}}
@if(session('success'))
<div class="alert-success">
    {{ session('success') }}
</div>
@endif

@if(session('error'))
<div class="alert-error">
    {{ session('error') }}
</div>
@endif

{{-- TABEL ANGGOTA --}}
<div class="dashboard-card">

    <div style="overflow-x: auto;">
        <table class="data-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Telepon</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse($members as $member)
                <tr>
                    <td>
                        {{ $members->firstItem() + $loop->index }}
                    </td>

                    <td>{{ $member->code }}</td>

                    <td>{{ $member->name }}</td>

                    <td>{{ $member->email ?? '-' }}</td>

                    <td>{{ $member->phone ?? '-' }}</td>

                    <td>{{ $member->address ?? '-' }}</td>

                    <td>
                        <div class="action-buttons">

                            <a href="{{ route('members.show', $member) }}"
                                class="btn-secondary">
                                Detail
                            </a>

                            <a href="{{ route('members.edit', $member) }}"
                                class="btn-edit">
                                Edit
                            </a>

                            <form
                                action="{{ route('members.destroy', $member) }}"
                                method="POST"
                                onsubmit="return confirm('Yakin ingin menghapus anggota ini?')">

                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn-delete">
                                    Hapus
                                </button>
                            </form>

                        </div>
                    </td>
                </tr>

                @empty
                <tr>
                    <td colspan="7" class="empty-data">
                        Belum ada data anggota.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="pagination">
        {{ $members->links() }}
    </div>

</div>

@endsection