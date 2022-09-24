<div class="top-action-insurance">
    <div class="top-action-insurance_header">
        <h2>Страхование грузов и посылок</h2>
        <img src="{{asset('assets/img/shield.png')}}" alt="shield"/>
    </div>

    <p>Все посылки и грузы отправляемые через Скай Экспресс могут быть застрахованы. Спите спокойно, страховка
        сохранит ваши заказы. Страхование покрывает повреждение или утрату груза
        <br/> или посылки.</p>

    <button class="btn">Узнать больше</button>

</div>

<div class="top-action-discount">

    <div class="topSlider" x-data="sideSlider()">

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
</div>

<script>

    function sideSlider() {
        return {
            slidesLength: {{$slidesCount}},
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
