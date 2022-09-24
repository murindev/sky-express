@push('scripts')
    <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU&amp;apikey=d46fd0b4-1143-46d6-976b-91c006741534"
            type="text/javascript"></script>
@endpush
@extends('templates.main')
@section('main')
    <x-layouts.section class="breadcrumbs">
        <x-blocks.breadcrumbs title="Офисы"/>
    </x-layouts.section>

    <x-layouts.section class="contacts-wpr">

        <div class="contacts">

            <h3>Наши офисы</h3>

            <div class="contacts-city">
                <span>г. Москва</span>
                <em><b>Всего</b>: {{count($offices)}} офисов</em>
            </div>
{{--


                        <p>NGN8</p>
                        <p><b>Ногинск, <br/> 3-й Текстильный переулок, 4</b></p>
                        <p>
                            Время работы: <br/>
                            <span>Пн-Пт 10:00-19:00</span>
                            <span>Сб-Вс 10:00-16:00</span>
                        </p>


--}}
            <div class="contacts-map">

                <div class="map-modal" id="map-modal">
                    <a class="map-modal-close" id="map-modal-close" href="javascript:">×</a>
                    <div class="map-modal-content" id="map-modal-content">

                    </div>
                </div>

                <div class="contacts-map-container" id="map">

                </div>
            </div>

            @foreach($offices as $key => $office)
                <div class="contacts-office">
                    <div class="address">
                        <span class="circled">{{$key+1}}</span>
                        <p>
                            <b>{{@$office->zip}}, {{@$office->city}},</b>
                            <b>{{@$office->address}} </b>
                        </p>
                    </div>

                    <div class="tel">
                        <span class="circled"></span>
                        <p>
                            <b>+ 7 <i>{{substr(@$office->phone, 4, 3)}}</i> {{substr(@$office->phone, 8)}}</b>
                            <em>Работаем круглосуточно</em>
                        </p>
                    </div>

                    <div class="email">
                        <span class="circled"></span>
                        <p>
                            {{@$office->email}}
                        </p>
                    </div>


                </div>
            @endforeach


        </div>
    </x-layouts.section>

    <script>

        var modal = document.getElementById('map-modal')

        document.getElementById('map-modal-close').addEventListener('click',function (e) {
            modal.classList.remove('show')
        })



        ymaps.ready(function () {
            var myMap = new ymaps.Map('map', {center: [55.751574, 37.573856], zoom: 12});
            var contentNest = document.getElementById('map-modal-content')


            var offices = @json($offices->toArray())

                var points = [];

            offices.forEach(function (i, k) {
                points[k] = myMap.geoObjects.add(new ymaps.Placemark([i.lat, i.lon], {
                    code: i.code,
                    zip: i.zip,
                    city: i.city,
                    address: i.address,
                    phone: i.phone,
                    schedule: i.schedule,
                    schedule_to: i.schedule_to,
                    email: i.email,
                }, {
                    iconLayout: 'default#imageWithContent',
                    iconImageHref: '{{asset('assets/img/point.svg')}}',
                    iconImageSize: [60, 82],
                    iconImageOffset: [-24, -24],
                    iconContentOffset: [15, 15],
                }))

            })



            myMap.geoObjects.events.add('click', function (e) {

                var target = e.get('target');
                var all = target.properties.getAll();

                var content = '<p>'+all.code+'</p>' +
                    '<p><b>'+all.zip+', '+all.city+' <br/>'+all.address+'</b></p>' +
                    '<p>Время работы: <br/>' +
                    '<span>'+all.schedule+'</span>' +
                    '<span>'+all.schedule_to+'</span>' +
                    '</p>';

                contentNest.innerHTML = content
                modal.classList.add('show')
                target.options.set('iconImageSize',[70, 90])
                myMap.setCenter(target.geometry.getCoordinates(), 12, {checkZoomRange: true});
            });

        });
    </script>
@endsection
