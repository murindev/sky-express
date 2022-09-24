<div class="select @if($attributes['label']) labeled  @endif" x-data="{model: '', val: '', open: false}">

    @if($attributes['label'])
        <span>{{ $attributes['label'] }}
            @if($attributes['required'])
            <sup>*</sup>
            @endif
        </span>
    @endif

    <input type="text" x-model="val" placeholder="{{$attributes['placeholder']}}"/>
    <input type="checkbox" id="{{$attributes['name']}}" x-model="open"/>
    <label class="select-flag" for="{{$attributes['name']}}"></label>
    <div class="options">
        @foreach($attributes['data'] as $item)
            <div class="option">
                <input type="radio" id="{{$item['id']}}" x-model="model" value="{{$item['id']}}" @change="onChange()"/>
                <label for="{{$item['id']}}" :class="{{$item['id']}} === model ? 'active' : ''">
                    <span>{{ $item['title'] }}</span>
                    {{ $item['desc'] }}
                </label>
            </div>
        @endforeach

    </div>
</div>
