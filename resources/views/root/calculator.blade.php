@extends('templates.main')
@section('main')
    <x-layouts.section  class="breadcrumbs">
        <x-blocks.breadcrumbs title="Рассчитать доставку" />
    </x-layouts.section>

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
