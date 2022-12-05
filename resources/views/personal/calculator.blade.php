@extends('templates.personal')
@section('personal')

    {{--    <livewire:measoft.calculator-personal/>--}}
    <x-layouts.row class="personal-border calc">
        <livewire:calculator-page/>
    </x-layouts.row>


    {{--    <x-layouts.section class="calculator-wpr">
            <x-calculator/>
        </x-layouts.section>--}}

    <button class="save-result">
        Сохранить
    </button>
    <button class="clear-result">
        Очистить
    </button>

@endsection
@push('alpinejs')
    <script src="{{asset('js/pages/calculator.js')}}"></script>
@endpush
