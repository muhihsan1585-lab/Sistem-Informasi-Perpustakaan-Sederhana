@extends('layouts.app')

@section('title', 'Manajemen Pengguna')

@section('content')
<div class="page-header">
    <div>
        <h2 class="page-title">Manajemen Pengguna</h2>
        <p class="page-description">Kelola akun admin dan petugas perpustakaan.</p>
    </div>
    <a href="{{ route('users.create') }}" class="btn-primary">Tambah User</a>
</div>

@if(session('success'))
<div class="alert-success">{{ session('success') }}</div>
@endif

@if(session('error'))
<div class="alert-error">{{ session('error') }}</div>
@endif

<div class="dashboard-card">
    <table class="data-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Role</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($users as $user)
            <tr>
                <td>{{ $users->firstItem() + $loop->index }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <span class="badge badge-{{ $user->role }}">{{ ucfirst($user->role) }}</span>
                </td>
                <td class="action-buttons">
                    <a href="{{ route('users.edit', $user->id) }}" class="btn-edit">Edit</a>

                    @if($user->id !== Auth::id())
                    <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-delete"
                            onclick="return confirm('Yakin ingin menghapus user ini?')">
                            Hapus
                        </button>
                    </form>
                    @endif
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="empty-data">Belum ada data user.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="pagination">
        {{ $users->links() }}
    </div>
</div>
@endsection