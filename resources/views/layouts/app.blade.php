<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Sistem Perpustakaan</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    @include('includes.navbar')

    <div class="main-container">
        @include('includes.sidebar')

        <main class="content">
            @yield('content')
        </main>
    </div>
</body>
</html>