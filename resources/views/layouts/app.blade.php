<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Дома игры престолов</title>

    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.0/css/all.css">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ mix('css/style.css') }}">
</head>
<body class="d-flex flex-column min-vh-100">

    <!-- Header -->
    @include('components.header')


    <!-- Main Content -->
    <main class="flex-grow-1 py-4">
        @yield('content')
    </main>

    <!-- Footer -->
    @include('components.footer')

    <!-- JS -->
    <script src="{{ mix('js/main.js') }}"></script>
    @stack('scripts')
</body>
</html>
