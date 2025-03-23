<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sistema de Membros')</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    @stack('styles')
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
</head>
<body>
    <header>
        
        <nav>
           
        </nav>
    </header>

    <div class="container">
        @yield('content') 
    </div>
</body>
</html>
