<aside class="sidebar">
    <div class="sidebar-title">MENU UTAMA</div>

    @if(Auth::user()->role === 'admin')
        <a href="{{ route('admin.dashboard') }}" class="menu-link">Dashboard</a>
        <div class="menu-link">Kategori</div>
        <div class="menu-link">Data Buku</div>
        <div class="menu-link">Data Anggota</div>
        <div class="menu-link">Peminjaman</div>
        <div class="menu-link">Manajemen Pengguna</div>
    @else
        <a href="{{ route('petugas.dashboard') }}" class="menu-link">Dashboard</a>
        <div class="menu-link">Kategori</div>
        <div class="menu-link">Data Buku</div>
        <div class="menu-link">Data Anggota</div>
        <div class="menu-link">Peminjaman</div>
    @endif
</aside>