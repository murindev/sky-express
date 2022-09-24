<div class="pop-departures-title">
    <h2>Популярные отправления</h2>
</div>
<div class="pop-departures-items">
    <div class="pop-departures-wpr">
        @foreach($departures as $departure)
            <div class="pop-departures-item">
                <span><b>От </b> {{$departure->from}}</span>
                <span><b>до</b> {{$departure->to}}</span>
                <p><small>От</small> {{$departure->price}} ₽</p>
            </div>
        @endforeach

    </div>

    <div class="blockSlider">
        <button class="blockSlider-btn next"></button>
        <button class="blockSlider-btn prev"></button>
    </div>

</div>
