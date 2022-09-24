@extends('templates.main')
@section('main')

    <x-layouts.section class="main">
        <div class="main-slider">
            <x-blocks.top-slider/>
        </div>
        <div class="main-widgets">
            <x-blocks.tabs-widget/>
        </div>
    </x-layouts.section>

    <x-layouts.section class="express-delivery" style="margin-top: 0;">
        <x-blocks.express-delivery/>
    </x-layouts.section>

    <x-layouts.section class="easy">
        <x-blocks.easy-departure/>
        <x-blocks.easy-courier/>
    </x-layouts.section>

    <x-layouts.section class="pop-departures" style="margin-top: 100px;">
        <x-blocks.popular-departures/>
    </x-layouts.section>

    <x-layouts.section class="top-actions">
            <x-blocks.side-slider/>
    </x-layouts.section>

    <x-layouts.section class="advantages">
        <x-blocks.advantages/>
    </x-layouts.section>

@endsection
