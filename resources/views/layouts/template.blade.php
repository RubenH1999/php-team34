<!doctype html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, , initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <title>@yield('title', 'Festival')</title>
</head>
<body>
@include('shared.navbar')

<div class="container mt-3 mb-5">
    <div class="justify-content-center">
    @yield('main')
    </div>
</div>

<script src="{{ mix('js/app.js') }}"></script>
@yield('script_after')

</body>

</html>
@include('shared.footer')
