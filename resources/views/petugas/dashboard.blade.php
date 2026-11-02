<h1>Dashboard Petugas</h1>
<p>Selamat datang, {{ Auth::user()->name }}!</p>
<p>Role: {{ Auth::user()->role }}</p>

<form action="{{ route('logout') }}" method="POST">
    @csrf
    <button type="submit">Logout</button>
</form>