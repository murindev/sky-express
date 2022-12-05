<div class="from-to-wpr">

    <h3>Куда отправить</h3>

    <label class="regular text" for="city">
        <span>Населенный пункт<sup>*</sup></span>
        <input type="text" disabled placeholder="г. Москва" value="{{$this->toStr}}" id="city">
        <small></small>
    </label>

    <label class="regular snip" for="streetTo">
        <span>Улица<sup>*</sup></span>
        <input type="text" placeholder="ул. Дибуновская" id="streetTo" wire:model="streetTo"
               wire:keyup="$emit('onStreetTo')" autocomplete="false">
        <em>
            @foreach(@$this->streetToList as $key => $streetToItem)
                <i wire:click="streetToSave({{$key}})">{{$streetToItem['typename']}} {{$streetToItem['shortname']}}</i>
            @endforeach
        </em>
        <small></small>
    </label>

    <label class="regular text" for="buildingTo">
        <span>Дом<sup>*</sup></span>
        <input type="text" placeholder="" id="buildingTo" wire:model="buildingTo">
        <small></small>

    </label>
    <label class="regular text" for="corpusTo">
        <span>Корпус</span>
        <input type="text" placeholder="" id="corpusTo" wire:model="corpusTo">
        <small></small>
    </label>

    <label class="regular text" for="blockTo">
        <span>Строение</span>
        <input type="text" placeholder="" id="blockTo" wire:model="blockTo">
        <small></small>
    </label>

    <label class="regular text" for="apartmentTo">
        <span>Квартира/офис</span>
        <input type="text" placeholder="" id="apartmentTo" wire:model="apartmentTo">
        <small></small>
    </label>

    <label class="regular text" for="nameTo">
        <span>Имя<sup>*</sup></span>
        <input type="text" placeholder="" id="nameTo" wire:model="nameTo">
        <small></small>
    </label>


    <label class="regular phone" for="phoneTo">
        <span>Телефон<sup>*</sup></span>
        <input type="phone" placeholder="" id="phoneTo" wire:model="phoneTo">
        <small></small>
    </label>

    <label class="regular email" for="emailTo">
        <span>E-mail</span>
        <input type="email" placeholder="" id="emailTo" wire:model="emailTo">
        <small></small>
    </label>



    <button class="accent">Подтвердить</button>

</div>
