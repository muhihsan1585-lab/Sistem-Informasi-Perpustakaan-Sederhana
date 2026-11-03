@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header bg-info text-white">
                    <h5 class="mb-0">Detail Anggota</h5>
                </div>
                <div class="card-body">
                    <table class="table table-borderless">
                        <tr>
                            <th width="35%">Kode Anggota</th>
                            <td>: <span class="badge bg-secondary">{{ $member->code }}</span></td>
                        </tr>
                        <tr>
                            <th>Nama Lengkap</th>
                            <td>: {{ $member->name }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>: {{ $member->email }}</td>
                        </tr>
                        <tr>
                            <th>No. Telepon</th>
                            <td>: {{ $member->phone ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Alamat</th>
                            <td>: {{ $member->address ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Terdaftar Pada</th>
                            <td>: {{ $member->created_at->format('d M Y H:i') }}</td>
                        </tr>
                    </table>
                    <div class="d-flex justify-content-between mt-3">
                        <a href="{{ route('members.index') }}" class="btn btn-secondary">Kembali</a>
                        <a href="{{ route('members.edit', $member->id) }}" class="btn btn-warning text-white">Edit Data</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection