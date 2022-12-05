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

        {{--        @foreach($cases as $case)
                    <input type="radio" id="'tab-add-switch'.{{$case['id']}}" value="{{$case['id']}}" x-model="package_type"/>
                    <label for="'tab-add-switch'.{{$case['id']}}" class="tab-add-switch-label">
                        <b>{{ $case['title'] }}</b>
                        <span>{{ $case['desc'] }} <em>{{ $case['weight'] }}</em></span>
                    </label>
                @endforeach--}}



        @foreach(@$this->standardPackages as $package)
            <input type="radio" id="'tab-add-switch-'.{{$package['id']}}" value="{{$package['id']}}" x-model="package_type"/>
            <label for="'tab-add-switch-'.{{$package['id']}}" class="tab-add-switch-label"
                   wire:click="$emit('applyStandardDimensions', {{$package['id']}})"
            >
                <b>{{ $package['title'] }}</b>
                <span>{{$package['length']}} х {{$package['width']}} х {{$package['height']}} мм <em> до {{ $package['weight'] }} кг.</em></span>
            </label>
        @endforeach

        <input type="radio" id="tab-add-switch-box-custom" value="box-custom" x-model="package_type"/>
        <label for="tab-add-switch-box-custom" class="tab-add-switch-label">
            <b>Точный размер</b>
            <span></span>
        </label>


        <div class="tab-add-switch-form" x-show="package_type === 'box-custom'">

            {{--            @foreach($switchFrom as $switchItem)
                            <label class="regular @if($switchItem['hint']) hint-inset  @endif" for="{{$switchItem['id']}}">

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
                        @endforeach--}}

            <label class="regular">
                <span>Длина, мм <sup>*</sup></span>
                <input type="number" wire:model.lazy="length" placeholder="290 мм"/>
            </label>

            <label class="regular">
                <span>Ширина, мм <sup>*</sup></span>
                <input type="number" wire:model.lazy="width" placeholder="210 мм"/>
            </label>

            <label class="regular">
                <span>Высота, мм <sup>*</sup></span>
                <input type="number" wire:model.lazy="height" placeholder="10 мм"/>
            </label>

            <label class="regular">
                <span>Вес, кг <sup>*</sup></span>
                <input type="number" wire:model.lazy="weight" placeholder="до 0,5 кг"/>
            </label>

            <label class="regular hint-inset">
                <span>Объемный вес</span>
                <input type="number" wire:model.lazy="volumedWeight" placeholder="до 0,5 кг"/>
                <small
                    rel="Объемный вес рассчитывается путем умножения длины в сантиметрах на ширину в сантиметрах на длину в сантиметрах."></small>
            </label>


            <button class="accent btn" wire:click="$emit('calculateDeliveries', false, 'Точный размер')">
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
            @foreach(@$this->packages as $key => $package)
                <tr>
                    <td>
                        <button><span>{{ $key+1 }}</span></button>
                    </td>
                    <td><span>{{ $package['description'] }}</span></td>
                    <td><span>{{$package['length'] * 10}} х {{$package['width'] * 10}} х {{$package['height'] * 10}} мм</span></td>
                    <td><span>{{ $package['mass'] }} кг.</span></td>
                    @if(isset($package['volumedWeight']))
                        <td><span>{{ $package['volumedWeight'] }}</span></td>
                    @else
                        <td><span>n/a</span></td>
                    @endif

                    <td>
                        @if(count(@$this->packages) > 1)
                            <button wire:click="deletePackage({{$key}})">Удалить</button>
                        @endif

                    </td>
                </tr>
            @endforeach

            </tbody>

            <tfoot>
            <tr>
                <th colspan="3"></th>
                <th><b>Итого</b></th>
                <th colspan="2">{{$this->price}} ₽</th>
            </tr>
            </tfoot>

        </table>

        <div class="tab-add-manage_btn">
            <button class="copy" wire:click="copyLast()" @if(count(@$this->packages) == 0) disabled @endif><span class="i-copy">Копировать последнюю посылку</span></button>
            <button wire:click="deleteAll()" class="remove"><span class="i-remove">Удалить все посылки</span></button>
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
            placeholder() {
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
