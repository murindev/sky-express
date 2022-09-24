@extends('templates.personal')
@section('personal')

    <x-layouts.section class="calculator-wpr">
        <x-calculator/>
    </x-layouts.section>

    <button class="save-result">
        Сохранить
    </button>
    <button class="clear-result">
        Очистить
    </button>

@endsection
