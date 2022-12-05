@extends('templates.main')
@section('main')
    <x-layouts.section class="breadcrumbs">
        <x-blocks.breadcrumbs title="Заказ оформлен"/>
    </x-layouts.section>

    <x-calculator-tabs.tab-track-number/>

    <x-layouts.section>
        <div class="ordered-info">
            <div class="ordered-info-header">Для чего нужен трек номер? Как им пользоваться?</div>
            <div class="ordered-info-items">
                <div class="ordered-info-item">
                    <div class="ordered-info-item_nr">1</div>
                    <p>
                        Трек номер нужен для отслеживания местоположение вашей посылки.
                    </p>
                </div>
                <div class="ordered-info-item">
                    <div class="ordered-info-item_nr">2</div>
                    <p>
                        Нажмите на кнопку «Копировать номер», он так же дублируется в вашем личном кабинете.
                    </p>
                </div>
                <div class="ordered-info-item">
                    <div class="ordered-info-item_nr">3</div>
                    <p>
                        Зайдите в раздел «Отслеживание посылки». И вставьте трек номер в поле ввода и нажмите кнопку «Отследить».
                    </p>
                </div>
                <div class="ordered-info-item">
                    <div class="ordered-info-item_nr">4</div>
                    <p>
                        В результате поиска покажет местоположение вашей посылки.
                    </p>
                </div>
            </div>

        </div>
    </x-layouts.section>





@endsection

