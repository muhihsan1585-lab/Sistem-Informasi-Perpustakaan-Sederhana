<aside class="sidebar">
    <div class="sidebar-title">MENU UTAMA</div>

    @if(Auth::user()->role === 'admin')

    <a href="{{ route('admin.dashboard') }}"
        class="menu-link">
        Dashboard
    </a>

    <a href="{{ route('categories.index') }}"
        class="menu-link">
        Kategori
    </a>

    <a href="{{ route('books.index') }}"
        class="menu-link">
        Data Buku
    </a>

    <a href="{{ route('members.index') }}"
        class="menu-link">
        Data Anggota
    </a>

    <a href="{{ route('borrowings.index') }}"
        class="menu-link">
        Peminjaman
    </a>

    <a href="{{ route('users.index') }}"
        class="menu-link">
        Manajemen Pengguna
    </a>

    @elseif(Auth::user()->role === 'petugas')

    <a href="{{ route('petugas.dashboard') }}"
        class="menu-link">
        Dashboard
    </a>

    <a href="{{ route('categories.index') }}"
        class="menu-link">
        Kategori
    </a>

    <a href="{{ route('books.index') }}"
        class="menu-link">
        Data Buku
    </a>

    <a href="{{ route('members.index') }}"
        class="menu-link">
        Data Anggota
    </a>

    <a href="{{ route('borrowings.index') }}"
        class="menu-link">
        Peminjaman
    </a>

    @endif
</aside>