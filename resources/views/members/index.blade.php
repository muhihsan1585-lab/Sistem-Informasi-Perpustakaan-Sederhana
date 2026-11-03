@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="mb-0">Daftar Anggota</h2>
        <a href="{{ route('members.create') }}" class="btn btn-primary">Tambah Anggota</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body p-0">
            <table class="table table-hover table-striped mb-0">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Kode</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Telepon</th>
                        <th>Alamat</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($members as $key => $member)
                        <tr>
                            <td>{{ $members->firstItem() + $key }}</td>
                            <td><span class="badge bg-secondary">{{ $member->code }}</span></td>
                            <td>{{ $member->name }}</td>
                            <td>{{ $member->email }}</td>
                            <td>{{ $member->phone ?? '-' }}</td>
                            <td>{{ $member->address ?? '-' }}</td>
                            <td class="text-center">
                                <a href="{{ route('members.show', $member->id) }}" class="btn btn-info btn-sm text-white">Detail</a>
                                <a href="{{ route('members.edit', $member->id) }}" class="btn btn-warning btn-sm text-white">Edit</a>
                                <form action="{{ route('members.destroy', $member->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus anggota ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-4 text-muted">Belum ada data anggota.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-3">
        {{ $members->links() }}
    </div>
</div>
@endsection