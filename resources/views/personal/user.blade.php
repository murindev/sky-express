@extends('templates.personal')
@section('personal')

    <livewire:personal.user/>

    <x-layouts.row class="personal-border">
        <div class="personal-user">
            <h2>Личные данные</h2>

            <div class="personal-user-contract">Договор № 123-ab123</div>
        </div>
    </x-layouts.row>




    <x-layouts.row class="personal-border">
        <div class="personal-user-data">

            <div class="key">1</div>
            <span class="item-info invoice_nr">Пользователь: <b>Сабаева Марина</b></span>
            <span class="item-info invoice_nr">E-mail: <b>msabaeva@telcomnet.su</b></span>
            <span class="item-info invoice_nr">Дата регистрации: <b>23.05.2022 / 09:38</b></span>

        </div>

        <a class="add-contact_btn" href="{{route('add-user')}}">Добавить контакт</a>

    </x-layouts.row>
@endsection
