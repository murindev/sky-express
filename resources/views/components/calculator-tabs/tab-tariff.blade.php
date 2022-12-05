<h3>Выберите тариф</h3>

<div class="inner-row tab-tariff-switcher" x-data="{tariff:'standard'}">
    <div>
        <div>
            @foreach(@$this->tariffs as $tariff)
                @if(empty($tariff['calc']))
                    <input type="radio" name="tariff" disabled id="{{$tariff['id']}}"
                           value="{{$tariff['id']}}" wire:model="tariff">
                    <label for="{{$tariff['id']}}">
                        <b>{{ $tariff['title'] }}</b>
                        <span>{{ $tariff['desc'] }}</span>
                    </label>
                @else
                    <input type="radio" name="tariff" id="{{$tariff['id']}}"
                           value="{{$tariff['id']}}" wire:model="tariff">
                    <label for="{{$tariff['id']}}">
                        <b>{{ $tariff['title'] }}</b>
                        <span>{{ $tariff['desc'] }}</span>
                    </label>
                @endif

            @endforeach
        </div>
    </div>
</div>
