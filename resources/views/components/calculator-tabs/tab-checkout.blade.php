<h3>Оформить заказ</h3>

<div class="tab-checkout-wpr" >
    <div class="tab-checkout-departures">

        @if(request()->session()->has('departures'))

            @foreach($this->departures as $key => $departure)

                <div class="departure" x-data="{one:'', two: ''}" :class="one ? 'on' : ''">
                    <div class="departure-btn">
                        <div class="departure-btn-name">
                            Отправление #{{$key + 1}}
                        </div>
                        <button x-show="!one" class="btn more" @click="one = 'on'">Узнать больше</button>
                        <button class="btn delete" wire:click="$emit('onDeleteDeparture', {{$key}})">Удалить</button>
                    </div>
                    <div class="departure-wpr first">
                        <div class="departure-from">
                            <b>{{$departure['custom']['town_from']}}, {{$departure['sender']['address']}}</b>
                        </div>
                        <div class="departure-mid"></div>
                        <div class="departure-to">
                            <b>{{$departure['custom']['town_to']}}, {{$departure['receiver']['address']}}</b>
                        </div>
                    </div>

                    <div class="departure-wpr ops">
                        <div class="departure-from">
                            <p class="departure-more">
                                <em>Срок доставки</em>
                                <span>
                                    от {{@$departure['custom']['mindeliverydays']}}
                                    до {{@$departure['custom']['maxdeliverydays']}} раб. дня
                                </span>
                            </p>
                        </div>
                        <div class="departure-mid"></div>
                        <div class="departure-to">
                            @if(@$departure['courier'])
                            <p class="departure-more"><em>Передать курьеру</em><span>250 ₽</span></p>
                            @endif

                            <p class="departure-more"><em>Стоимость отправления</em><span>{{@$departure['price']}} ₽</span></p>

                            @if(@$departure['inshprice'])
                                <p class="departure-more"><em>Стоимость страхования</em><span>{{@$departure['inshprice']}} ₽</span>
{{--                                    <button class="clean"/>--}}
                                </p>
                            @endif

                            <p class="departure-more"><em>Стоимость упаковки</em><span>0 ₽</span>
{{--                                <button class="clean"/>--}}
                            </p>

                        </div>
                    </div>

                </div>

            @endforeach

        @endif

    </div>
    <div class="tab-checkout-save">

        @if(@$this->departures && count(@$this->departures))
            <button class="btn" wire:click="$emit('onSaveAndNewCalculation')">Сохранить и сделать новый расчет</button>
            <button class="accent" wire:click="$emit('onSaveAndChoosePayment')">Сделать заказ,
                {{request()->session()->get('total')}}₽
            </button>
        @else
            <button class="btn" wire:click="$emit('onSaveAndNewCalculation')">Сделать новый расчет</button>
        @endif




    </div>
</div>
