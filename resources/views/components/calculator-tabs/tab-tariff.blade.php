<h3>Выберите тариф</h3>

<div class="inner-row tab-tariff-switcher" x-data="{tariff:'standard'}">
    <div>
        <div>
            @foreach($tariffs as $tariff)
                <input type="radio" name="tariff" id="{{$tariff['id']}}" value="{{$tariff['id']}}" x-model="tariff">
                <label for="{{$tariff['id']}}">
                    <b>{{ $tariff['title'] }}</b>
                    <span>{{ $tariff['desc'] }}</span>
                </label>
            @endforeach
        </div>
    </div>
</div>
