<div class="tab-add-cases">

    {{-- xs --}}
    <div class="tab-add-modal" x-data="tabAddMobile()">
        <button class="accent dark" @click="opened = true">
            <span class="i-add-circle white">Добавить посылку</span>
        </button>

        <div class="tab-add-modal-frame" x-show="opened">

            <div class="tab-add-modal-box">

                <a href="javascript:" class="tab-add-modal-close" @click="opened = false"></a>

                <div class="modal-box tab-add-modal-cases">
                    <b>Добавить посылку</b>


                    <div class="select  labeled">

                        <span>Размер посылки <sup>*</sup></span>

                        <input type="text" x-model="val" :placeholder="placeholder()"/>
                        <input type="checkbox" id="add-package" x-model="open"/>
                        <label class="select-flag" for="add-package"></label>
                        <div class="options">

                            @foreach($cases as $item)
                                <div class="option">
                                    <input type="radio" id="{{$item['id']}}" x-model="model"
                                           value="{{$item['id']}}"/> {{--@change="onChange()"--}}
                                    <label for="{{$item['id']}}" class="{{$item['id']}} === model ? 'active' : ''"
                                           @click="val = {{$item['title']}}">
                                        <span>{{ $item['title'] }}</span>
                                        {{ $item['desc'] }}
                                    </label>
                                </div>
                            @endforeach

                        </div>
                    </div>


                    @foreach($switchFrom as $item)
                        <label class="regular {{$item['hint']}}" for="{{$item['id']}}" x-show="model === 'box-custom'">
                            <span>{{$item['label']}}
                                @if($item['required'])
                                    <sup>*</sup>
                                @endif
                            </span>
                            <input type="{{$item['type']}}" placeholder="{{$item['placeholder']}}"
                                   id="{{$item['id']}}"/>
                        </label>
                    @endforeach


                    <button class="accent btn">
                        <span class="i-add-circle">Добавить</span>
                    </button>


                </div>

            </div>


        </div>


    </div>

    {{--md--}}

    <h3>Добавить посылку</h3>

    <a href="javascript:" class="tab-add-top"></a>

    <div class="tab-add-switch" x-data="{open: false, package_type:'envelope'}">

        @foreach($cases as $case)
            <input type="radio" id="'tab-add-switch'.{{$case['id']}}" value="{{$case['id']}}" x-model="package_type"/>
            <label for="'tab-add-switch'.{{$case['id']}}" class="tab-add-switch-label">
                <b>{{ $case['title'] }}</b>
                <span>{{ $case['desc'] }} <em>{{ $case['weight'] }}</em></span>
            </label>
        @endforeach

        <div class="tab-add-switch-form" x-show="package_type === 'box-custom'">

            @foreach($switchFrom as $switchItem)
                <label class="regular @if($switchItem['hint']) 'hint-inset'  @endif" for="{{$switchItem['id']}}">

                    <span>{{ $switchItem['label'] }}
                        @if($switchItem['required'])
                            <sup>*</sup>
                        @endif
                    </span>
                    <input type="{{$switchItem['type']}}" placeholder="{{$switchItem['placeholder']}}"
                           id="{{$switchItem['id']}}"/>
                    @if($switchItem['hint'])
                        <small rel="{{$switchItem['hint']}}"></small>
                    @endif

                </label>
            @endforeach


            <button class="accent btn">
                <span class="i-add-circle">Добавить посылку</span>
            </button>

        </div>

    </div>


    <div class="tab-add-manage">
        <table class="tab-add-table">

            <thead>
            <tr>
                <th><span>№</span></th>
                <th><span>Тип</span></th>
                <th><span>Размеры</span></th>
                <th><span>Вес</span></th>
                <th colspan="2"><span>Объемный вес</span></th>

            </tr>
            </thead>

            <tbody>
            @foreach($tbl as $row)
                <tr>
                    <td>
                        <button><span>{{ $row['col1'] }}</span></button>
                    </td>
                    <td><span>{{ $row['col2'] }}</span></td>
                    <td><span>{{ $row['col3'] }}</span></td>
                    <td><span>{{ $row['col4'] }}</span></td>
                    <td><span>{{ $row['col5'] }}</span></td>
                    <td>
                        <button>Удалить</button>
                    </td>
                </tr>
            @endforeach

            </tbody>

            <tfoot>
            <tr>
                <th colspan="3"></th>
                <th><b>Итого</b></th>
                <th>3000₽</th>
                <th></th>
            </tr>
            </tfoot>

        </table>

        <div class="tab-add-manage_btn">
            <button class="copy"><span class="i-copy">Копировать последнию посылку</span></button>
            <button class="remove"><span class="i-remove">Удалить все посылки</span></button>
        </div>

        <div class="tab-add-manage_text">
            <b>Уважаемые клиенты!</b>
            <p>
                Расчёт стоимости доставки произведен на основании введённых Вами данных. Если Вы указали параметры
                отправления
                приблизительно – не беда, мы произведем на сортировочном пункте повторные замеры и в случае расхождения
                с
                Вашими данными, зафиксируем данные измерений. Если Вам понадобится подтверждение наших расчетов, Вы
                можете
                бесплатно сделать их в течение 7 дней после оформления заказа через форму обратной связи. Просим Вас с
                пониманием отнестись к нашей просьбе доплатить разницу, если вес Вашего отправления окажется больше, чем
                Вы
                указали
            </p>
        </div>


        <cite class="warn">
            Не считая дня забора
        </cite>


    </div>

</div>

<script>
    function tabAddMobile() {
        return {
            model: 'box-envelope',
            val: '',
            open: false,
            opened: false,
            cases: @json($cases),
            placeholder () {
                let ob = this.cases.find(i => i.id === this.model)
                this.open = false
                return ob.title
            },
            init() {
                this.placeholder()
            }
        }
    }

</script>
