<label class="selectBox contrast"
       x-data="selectBox(@js($current))"
       @click.outside="show = false"
       @click="show = true"
       wire:ignore
    {{ $attributes }}
>
    <input type="text" disabled :value="title" placeholder="{{$placeholder}}"  >

    <div class="selectBox-options" x-show="show">
        @foreach(@$payload as $item)
            <div class="selectBox-option" @click="setValues( {{$item}} )" >{{$item->title}}</div>
        @endforeach
    </div>

</label>

<script>
    function selectBox(current) {
        return {
            show: false,
            title: current.title,
            setValues(item) {
                this.$dispatch('input', item.id);
                this.title = item.title
            },
        }
    }

</script>
