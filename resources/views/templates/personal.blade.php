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
    <div class="personal-menu">
        <button class="accent">Сделать заказ</button>
        <button class="btn clean">Заказать конверты и пакеты</button>

        <nav>
            <a href="{{route('user')}}" class="{{ in_array(Route::currentRouteName(), ['user','add-user']) ? 'active' : '' }}"><span>Личные данные</span></a>
            <a href="{{route('departures')}}" class="{{ Route::currentRouteName() === 'departures' ? 'active' : '' }}"><span>Все отправления</span></a>
            <a href="{{route('address-book')}}" class="{{ Route::currentRouteName() === 'address-book' ? 'active' : '' }}"><span>Адресная книга</span></a>
            <a href="{{route('calculate')}}" class="{{ Route::currentRouteName() === 'calculate' ? 'active' : '' }}"><span>Калькулятор</span></a>
            <a href="{{route('docs')}}" class="{{ Route::currentRouteName() === 'docs' ? 'active' : '' }}"><span>Документы</span></a>
        </nav>

        @yield('personal-menu')

    </div>
    <div class="personal-body">
        @yield('personal')
    </div>
</x-layouts.section>

@include('templates.footer')
@livewireScripts
@stack('alpinejs')
</body>
</html>
