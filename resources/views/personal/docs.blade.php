@extends('templates.personal')

@section('personal')

    <x-layouts.row class="personal-border personal-docs_form" >

        <label class="contrast" for="from">
            <span>Период:</span>
            <input type="text" placeholder="с" id="from"/>
        </label>
        <label class="contrast" for="to">
            <span>&nbsp;</span>
            <input type="text" placeholder="по" id="to"/>
        </label>
        <label class="contrast" for="name">
            <span>Название документа:</span>
            <input type="text" placeholder="" id="name"/>
        </label>
        <label class="contrast" for="doc_nr">
            <span>Номер документа:</span>
            <input type="text" placeholder="" id="doc_nr"/>
        </label>
        <label class="contrast" for="sum">
            <span>Сумма:</span>
            <input type="text" placeholder="" id="sum"/>
        </label>

        <div class="personal-docs_btn">
            <button class="apply">Применить</button>
            <button class="reject">Сбросить</button>
        </div>

    </x-layouts.row>

    <x-layouts.row class="personal-border personal-docs_table">

        <h2>Документы</h2>


        <table>

            <thead>
            <tr>
                <th> <p>№</p></th>
                <th>
                    <p>
                        Период
                        <button class="clean sort"/>
                    </p>

                </th>
                <th>
                    <p>Название документа
                        <button class="clean sort"/></p>
                </th>
                <th> <p>Дата
                        <button class="clean sort"/></p>
                </th>
                <th> <p>Номер
                        <button class="clean sort"/></p>
                </th>
                <th> <p>Сумма
                        <button class="clean sort"/></p>
                </th>
                <th> <p>Действия</p></th>
            </tr>
            </thead>

            <tbody>
            @for ($item = 1; $item <= 13; $item ++)
            <tr x-for="i in 13">
                <td><span>{{$item}}</span></td>
                <td>
                    <span>Апрель</span>
                    <span>2022 г.</span>
                </td>
                <td>
                    <a href="javascript:" class="print">Счет</a>
                    <a href="javascript:" class="print">Акт</a>
                    <a href="javascript:" class="print">Счет-фактура</a>
                    <a href="javascript:" class="print">УПД</a>
                </td>
                <td>
                    <span>12.03.2022</span>
                    <span>14.03.2022</span>
                    <span>15.03.2022</span>
                    <span>16.03.2022</span>
                </td>
                <td>
                    <span>№32</span>
                    <span>№33</span>
                    <span>№34</span>
                    <span>№35</span>
                </td>
                <td>
                    <span>12 020 ₽</span>
                    <span>5 500 ₽</span>
                    <span>2 800 ₽</span>
                    <span>24 100 ₽</span>
                </td>
                <td>
                    <a href="javascript:" class="print">Распечатать</a>
                    <a href="javascript:"  class="file">Отправить <br/> на e-mail</a>
                </td>

            </tr>
            @endfor
            </tbody>

        </table>

        <pagination/>

    </x-layouts.row>

@endsection

@section('personal-menu')
    <div class="personal-reconciliation">
        <h2>Акт сверки</h2>

        <label class="contrast">
            <input type="text" placeholder='ООО "ТЕЛКОМНЭТ"'/>
        </label>

        <label class="contrast">
            <textarea placeholder="Укажите, пожалуйста, период"></textarea>
        </label>

        <label class="contrast">
            <input type="text" placeholder="Ваш e-mail"/>
        </label>

        <button class="accent">Отправить</button>
    </div>
@endsection
