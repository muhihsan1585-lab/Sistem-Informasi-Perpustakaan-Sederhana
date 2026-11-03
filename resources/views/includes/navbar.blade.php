<nav class="navbar">
    <div class="brand">Sistem Informasi Perpustakaan</div>

    <div class="nav-user">
        <span>{{ Auth::user()->name }}</span>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn-logout">Logout</button>
        </form>
    </div>
</nav>