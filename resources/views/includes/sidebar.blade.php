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
    <a href="{{ route('users.index') }}" class="menu-link">Manajemen Pengguna</a>
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