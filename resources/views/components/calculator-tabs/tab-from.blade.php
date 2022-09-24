<div class="from-to-wpr">

    <h3>Откуда забрать</h3>

    @foreach($inputs as $input)
        <label class="regular {{$input['type']}}"  for="{{$input['id']}}">
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
                <input type="{{$input['type']}}" placeholder="{{$input['placeholder']}}" id="{{$input['id']}}"/>
            @endif
            <small>{{$input['hint']}}</small>

        </label>
    @endforeach

    <button class="accent">Подтвердить</button>

</div>
