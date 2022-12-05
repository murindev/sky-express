<div class="from-to-wpr">

    <h3>Откуда забрать</h3>

    {{--    @foreach(@$this->inputsFrom as $input)
            <label class="regular {{$input['type']}}" for="{{$input['id']}}">
                <span>{{$input['label']}}
                    @if($input['required'])
                        <sup>*</sup>
                    @endif
                </span>
                @if($input['type'] === 'select')
                    <template>
                        <input type="text" placeholder="{{$input['placeholder']}}" id="{{$input['id']}}"/>
                        <em>
                            @foreach($cities as $city)
                                <i>{{$city}}</i>
                            @endforeach
                        </em>
                    </template>
                @else
                    <input type="{{$input['type']}}" placeholder="{{$input['placeholder']}}" id="{{$input['id']}}" wire:model="{{$input['id']}}"/>
                @endif
                <small>{{$input['hint']}}</small>

            </label>
        @endforeach--}}


    <label class="regular text" for="city">
        <span>Населенный пункт<sup>*</sup></span>
        <input type="text" disabled placeholder="г. Москва" value="{{$this->fromStr}}" id="city">
        <small></small>
    </label>

    <label class="regular snip" for="streetFrom">
        <span>Улица<sup>*</sup></span>
        <input type="text" placeholder="ул. Дибуновская" id="streetFrom" wire:model="streetFrom"
               wire:keyup="$emit('onStreetFrom')" autocomplete="false">
        <em>
            @foreach(@$this->streetFromList as $key => $streetFromItem)
                <i wire:click="streetFromSave({{$key}})">{{$streetFromItem['typename']}} {{$streetFromItem['shortname']}}</i>
            @endforeach
        </em>
        <small></small>
    </label>

    <label class="regular text" for="buildingFrom">
        <span>Дом<sup>*</sup></span>
        <input type="text" placeholder="" id="buildingFrom" wire:model="buildingFrom">
        <small></small>

    </label>
    <label class="regular text" for="corpusFrom">
        <span>Корпус</span>
        <input type="text" placeholder="" id="corpusFrom" wire:model="corpusFrom">
        <small></small>
    </label>

    <label class="regular text" for="blockFrom">
        <span>Строение</span>
        <input type="text" placeholder="" id="blockFrom" wire:model="blockFrom">
        <small></small>
    </label>

    <label class="regular text" for="apartmentFrom">
        <span>Квартира/офис</span>
        <input type="text" placeholder="" id="apartmentFrom" wire:model="apartmentFrom">
        <small></small>
    </label>

    <label class="regular text" for="nameFrom">
        <span>Имя<sup>*</sup></span>
        <input type="text" placeholder="" id="nameFrom" wire:model="nameFrom">
        <small></small>
    </label>


    <label class="regular phone" for="phoneFrom">
        <span>Телефон<sup>*</sup></span>
        <input type="phone" placeholder="" id="phoneFrom" wire:model="phoneFrom">
        <small></small>
    </label>

    <label class="regular email" for="emailFrom">
        <span>E-mail</span>
        <input type="email" placeholder="" id="emailFrom" wire:model="emailFrom">
        <small></small>
    </label>

    <button class="accent">Подтвердить</button>

</div>



