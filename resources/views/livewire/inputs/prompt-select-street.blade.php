<label class="selectBox contrast half no-icon">
    <input type="text" wire:model="streetSearch" wire:keydown.backspace="backSpace" placeholder="{{$placeholder}}"/>

    @if(count(@$streetsList) > 0)
        <div class="selectBox-options">
            @foreach(@$streetsList as $streetKey => $streetArr)
                @if(is_array($streetArr) && array_key_exists('name',$streetArr))
                    <div class="selectBox-option"  wire:click="setStreet({{@$streetArr['code']}})">{{@$streetArr['name']}}</div>
                @endif
            @endforeach
        </div>
    @endif

</label>
