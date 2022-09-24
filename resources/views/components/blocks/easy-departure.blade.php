<div class="easy-departure">
    <img src="{{asset('assets/img/departure.svg')}}" alt="departure"/>
    <div class="easy-departure-title">
        <h2>Отправить посылку легко!</h2>
        <span>Как рассчитать сроки и стоимость доставки с помощью калькулятора?</span>
    </div>
    <x-layouts.inner-row class="easy-departure-steps">
        @foreach($easyDepartures as $key => $easyDeparture)
            <div class="easy-departure-step">
                <b>{{ $key +1 }}</b>
                <span>
               {{ $easyDeparture->text }}
              </span>
            </div>
        @endforeach
    </x-layouts.inner-row>
</div>
