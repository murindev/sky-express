<div class="easy-courier">

    <h2>Вызовите курьера <br/> в Москве, он:</h2>
    <x-layouts.inner-row>
        @foreach($easyCouriers as $easyCourier)
            <div class="easy-courier-step">
                <div class="easy-courier-step_icon">
                    <img src="{{asset('assets/img/icons/courier-step.svg')}}" alt="courier-step"/>
                </div>
                <div class="easy-courier-step_info">{{ $easyCourier->text }}</div>
            </div>
        @endforeach

    </x-layouts.inner-row>

</div>
