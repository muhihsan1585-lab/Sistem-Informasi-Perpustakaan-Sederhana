<aside class="sidebar">
    <div class="sidebar-title">MENU UTAMA</div>

    @if(Auth::user()->role === 'admin')
    <a href="{{ route('admin.dashboard') }}" class="menu-link">Dashboard</a>
    <a href="{{ route('categories.index') }}" class="menu-link">
        Kategori
    </a>

    <a href="{{ route('books.index') }}" class="menu-link">
        Data Buku
    </a>
    <div class="menu-link">Data Anggota</div>
    <div class="menu-link">Peminjaman</div>
    <div class="menu-link">Manajemen Pengguna</div>
    @else
    <a href="{{ route('petugas.dashboard') }}" class="menu-link">Dashboard</a>
    <a href="{{ route('categories.index') }}" class="menu-link">
        Kategori
    </a>

    <a href="{{ route('books.index') }}" class="menu-link">
        Data Buku
    </a>
    <div class="menu-link">Data Anggota</div>
    <div class="menu-link">Peminjaman</div>
    @endif
</aside>