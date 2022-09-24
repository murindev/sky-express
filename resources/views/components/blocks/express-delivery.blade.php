<div class="express-delivery-title">
    <h2>Экспресс-доставка, доступная каждому</h2>
    <button class="btn">Вызвать курьера</button>
</div>

<x-layouts.inner-row>
    @foreach($expressDeliveries as $expressDelivery)
        <div class="express-delivery-service">
            <div class="express-delivery-service_icon">
                <img src="{{asset('storage/'.$expressDelivery->icon)}}" alt="service"/>
            </div>
            <span>{{ $expressDelivery->text }}</span>
        </div>
    @endforeach

</x-layouts.inner-row>
