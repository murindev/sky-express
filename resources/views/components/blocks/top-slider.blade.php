<div class="topSlider" x-data="slideIt()">
    <div class="topSlider-dots">
        @foreach($slides as $key =>  $slide)
            <div class="topSlider-dot"
                 :class="currentIndex === {{$key}} ? 'active' : ''"
                 x-on:click="currentIndex = {{$key}}"
            ></div>
        @endforeach

    </div>

    @foreach($slides as $k => $slide)
        <cite x-show="currentIndex === {{$k}}">
            {{@$slide->cite_before}}
            @if(@$slide->cite_accent)
                <span class="accent">{{@$slide->cite_accent}}</span>
            @endif
            {{@$slide->cite_after}}
        </cite>
        <button x-show="currentIndex === {{$k}}" class="btn clean">{{$slide->btn}}</button>
    @endforeach
</div>

<script>

    function slideIt() {
        return {
            slidesLength: {{count($slides)}},
            currentIndex: 0,
            next() {
                this.currentIndex < this.slidesLength - 1 ? this.currentIndex++ : this.currentIndex = 0
            },
            currentSlide(key) {
                this.currentIndex = key
            },
            init() {
                setInterval(() => this.next(), 10000)
            }
        }
    }

</script>
