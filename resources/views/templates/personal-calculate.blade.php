<html lang="RU">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="icon" href="/favicon.ico">
    <link rel="stylesheet" href="{{asset('assets/less/style.css')}}">
    <script defer src="https://unpkg.com/@alpinejs/mask@3.x.x/dist/cdn.min.js"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    @stack('scripts')
    <title>TITLE</title>
</head>
<body class="{{Illuminate\Support\Facades\Route::currentRouteName()}}">

@include('templates.personal-header')

<x-layouts.section class="personal-wpr">
    @yield('personal')
</x-layouts.section>

@include('templates.footer')
@livewireScripts
@stack('alpinejs')
</body>
</html>
