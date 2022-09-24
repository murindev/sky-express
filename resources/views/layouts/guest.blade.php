<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link rel="stylesheet" href="{{asset('assets/less/style.css')}}">

    </head>
    <body>

    <x-layouts.section class="auth">

        <div class="auth-wpr">
            <a href="{{route('home')}}" class="auth-logo">
                <img src="{{asset('assets/img/svg-logo-regular.svg')}}" alt="logo"/>
            </a>

            {{ $slot }}

        </div>

    </x-layouts.section>

    </body>
</html>
@if( config('app.debug') )
    <script src="{{asset('assets/js/socket.js')}}"></script>
@endif
