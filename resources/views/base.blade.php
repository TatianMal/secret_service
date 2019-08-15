<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    @yield('additional_css')
</head>
<body>

<main>
    @yield('content')
</main>

</body>
</html>