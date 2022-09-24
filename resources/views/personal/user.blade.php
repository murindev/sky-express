@extends('templates.personal')
@section('personal')

    <x-layouts.row class="personal-border">
        <div class="personal-user">
            <h2>Личные данные</h2>

            <div class="personal-user-contract">Договор № 123-ab123</div>
        </div>
    </x-layouts.row>

    <x-layouts.row class="personal-border">
        <div class="personal-user-table">

            <div class="personal-user-row">
                <div class="personal-user-col">Название организации</div>
                <div class="personal-user-col"> ООО "ТЕЛКОМНЭТ"</div>
            </div>

            <div class="personal-user-row">
                <div class="personal-user-col">Ф.И.О.</div>
                <div class="personal-user-col">Сабаева Марина</div>
            </div>

            <div class="personal-user-row">
                <div class="personal-user-col">E-mail</div>
                <div class="personal-user-col">msabaeva@telcomnet.su</div>
            </div>

            <div class="personal-user-row">
                <div class="personal-user-col">Номер телефона</div>
                <div class="personal-user-col">8 495 225 1000</div>
            </div>

            <div class="personal-user-row">
                <div class="personal-user-col">Юридический адрес</div>
                <div class="personal-user-col">11111111, Россия, г. Москва, ул. Зеленоградская, 17</div>
            </div>

            <div class="personal-user-row">
                <div class="personal-user-col">Фактический адрес</div>
                <div class="personal-user-col">11111111, Россия, г. Москва, ул. Лесная, 32</div>
            </div>

            <div class="personal-user-row">
                <div class="personal-user-col">Менеджер по продажам</div>
                <div class="personal-user-col">

                    <div>
                        <span>Жданова Виктория</span>
                        <span>info@skyru</span>
                        <span>+ 7 222 222-22-22</span>
                    </div>

                    <button class="accent">Написать</button>

                </div>
            </div>
            <div class="personal-user-row">
                <div class="personal-user-col">Менеджер по обслуживанию</div>
                <div class="personal-user-col">

                    <div>
                        <span>Иванов Иван</span>
                        <span>info@br.ru</span>
                        <span>+ 7 222 222-22-22</span>
                    </div>

                    <button class="accent">Написать</button>

                </div>
            </div>

            <div class="personal-user-row">
                <div class="personal-user-col">Баланс</div>
                <div class="personal-user-col"><b>200 ₽</b></div>
            </div>

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
