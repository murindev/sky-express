<h3>Калькулятор стоимости доставки</h3>
<fieldset>
    <label data-type="prompt">
        <span class="prompt-wpr">@foreach(@$this->fromList as $list)<a href="javascript:" wire:click="setTownFrom({{$list['code']}})">{{$list['name']}}</a>@endforeach</span>
        <span class="placeholder i-map-point mid">
            <b>Откуда:</b>
            <input type="text" class="thin" wire:model="fromStr" wire:keyup="$emit('from')"/>
        </span>
    </label>

    @if(@$this->townFromArray && @$this->townToArray)
        <div class="change-holder">
            <button class="clean change" wire:click="changeDirection()"></button>
        </div>
    @endif

    <label data-type="prompt" @click.outside="to = ''">

        <span class="prompt-wpr">@foreach(@$this->toList as $list)<a href="javascript:" wire:click="setTownTo({{$list['code']}})">{{$list['name']}}</a>@endforeach</span>
        <span class="placeholder i-map-point mid">
            <b>Куда:</b>
            <input type="text" class="thin" wire:model="toStr" wire:keyup="$emit('to')"/>
        </span>
    </label>

    <div data-type="promptSelect" @click.outside="active = false">

        <input type="checkbox" class="promptSelect-chb" id="package" x-model="active"/>
        <label class="promptSelect-trigger" :class="active ? 'i-chevron' : 'i-chevron-bottom'" for="package">
            {{@$this->dimensionsStr}}
        </label>

        <div class="promptSelect-wpr">
            <div class="promptSelect-tabs">

                <button class="promptSelect-tab" :class="currentTab === 'PackageCustom' ? 'active' : ''"
                        @click="currentTab = 'PackageCustom'">Точные размеры
                </button>
                <button class="promptSelect-tab" :class="currentTab === 'PackageStandard' ? 'active' : ''"
                        @click="currentTab = 'PackageStandard'">Примерно
                </button>
            </div>

            <div class="promptSelect-body">

                @foreach(@$this->standardPackages as $package)
                    <div class="package-standard" x-show="currentTab === 'PackageStandard'">
                        <input type="radio" id="{{$package['id']}}" value="{{$package['id']}}"/>
                        <label wire:click="$emit('applyStandardDimensions', {{$package['id']}}), true"
                               class="@if(@$this->standardDimensionId === $package['id']) active @endif">

                            <span>{{$package['title']}}</span>

                            @if(!$package['short'])
                                {{$package['length']}} х {{$package['width']}} х {{$package['height']}} мм
                                до {{$package['weight']}} кг
                            @endif

                        </label>
                    </div>
                @endforeach

                <div class="package-custom" x-show="currentTab === 'PackageCustom'">

                    <label class="regular">
                        <span>Длина, мм <sup>*</sup></span>
                        <input type="number" class="light" wire:model.lazy="length" placeholder="290 мм"/>
                    </label>

                    <label class="regular">
                        <span>Ширина, мм <sup>*</sup></span>
                        <input type="number" class="light" wire:model.lazy="width" placeholder="210 мм"/>
                    </label>

                    <label class="regular">
                        <span>Высота, мм <sup>*</sup></span>
                        <input type="number" class="light" wire:model.lazy="height" placeholder="10 мм"/>
                    </label>

                    <label class="regular">
                        <span>Вес, кг <sup>*</sup></span>
                        <input type="number" class="light" wire:model.lazy="weight" placeholder="до 0,5 кг"/>
                    </label>


                    <button class="accent" wire:click="$emit('calculateDeliveries', true, 'Точный размер')" x-text="submitFormText"/>

                </div>

            </div>

        </div>

    </div>
    @if($this->length && $this->width && $this->height && $this->weight && $this->townFromArray && $this->townToArray)
        <button class="accent" wire:click="$emit('calculateDeliveries', true)">Выбрать тариф</button>
    @endif


</fieldset>
