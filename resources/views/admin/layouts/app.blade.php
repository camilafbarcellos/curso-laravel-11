<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- dynamic title --}}
    <title>@yield('title') - Especializa TI</title>
</head>
<body>
    <header>header</header>
    {{-- dynamic content --}}
    @yield('content')
    <footer>footer</footer>
</body>
</html>
