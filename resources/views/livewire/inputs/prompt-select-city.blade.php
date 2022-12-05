<label class="selectBox contrast no-icon">
    <input type="text" wire:model.debounce.1000="citySearch" wire:keydown.backspace="backSpace" placeholder="{{$placeholder}}"/>

    @if(count(@$citiesList) > 0)
        <div class="selectBox-options">
            @foreach(@$citiesList as $key => $cityArr)
                @if(is_array($cityArr) && array_key_exists('name',$cityArr))
                    <div class="selectBox-option"  wire:click="setCity({{@$cityArr['code']}})">{{@$cityArr['name'] ?? ''}}</div>
                @endif
            @endforeach
        </div>
    @endif

</label>
{{--wire:keydown.backspace="onFreshPromptSelectCity"--}}
