<?php

namespace App\Http\Livewire;

use App\Models\Props\PropsStandardDimensions;
use App\Models\Settings\Values;
use App\Services\Courier\Api\CitiesList;
use App\Services\Courier\Courier;
use App\Services\Courier\Inputs\AddressFrom;
use App\Services\Courier\Inputs\CourierVariables;
use Illuminate\Support\Facades\Route;
use Livewire\Component;

class CalculatorPage extends BaseComponent
{
    use CourierVariables, AddressFrom;

    public $radio = 'tab-checkout'; // tab-calc tab-payment

    public $routeName;

    public $arrPrices = [];

    public $steps = [
        [
            'nr' => '1',
            'id' => 'tab-calc',
            'active' => true,
            'title' => 'Калькулятор',
            'isTab' => 'tab',
            'component' => 'tab-calc'
        ],
        [
            'nr' => '2',
            'id' => 'tab-tariff',
            'active' => false,
            'title' => 'Выбрать тариф',
            'isTab' => 'tab',
            'component' => 'tab-tariff'
        ],
        [
            'nr' => '3',
            'id' => 'tab-from',
            'active' => false,
            'title' => 'Откуда забрать',
            'isTab' => 'no-tab',
            'component' => 'tab-from'
        ],
        [
            'nr' => '4',
            'id' => 'tab-to',
            'active' => false,
            'title' => 'Куда отправить',
            'isTab' => 'no-tab',
            'component' => 'tab-to'
        ],
        [
            'nr' => '5',
            'id' => 'tab-add',
            'active' => false,
            'title' => 'Добавить посылку',
            'isTab' => 'no-tab',
            'component' => 'tab-add'
        ],
        [
            'nr' => '6',
            'id' => 'tab-services',
            'active' => false,
            'title' => 'Дополнительные услуги',
            'isTab' => 'no-tab',
            'component' => 'tab-services'
        ],
        [
            'nr' => '7',
            'id' => 'tab-checkout',
            'active' => false,
            'title' => 'Оформить заказ',
            'isTab' => 'no-tab',
            'component' => 'tab-checkout'
        ],
        [
            'nr' => '8',
            'id' => 'tab-payment',
            'active' => false,
            'title' => 'Выбрать способ оплаты',
            'isTab' => 'no-tab',
            'component' => 'tab-payment'
        ],
        [
            'nr' => '9',
            'id' => 'tab-track-number',
            'active' => false,
            'title' => 'Ваш заказ оформлен',
            'isTab' => 'no-tab',
            'component' => 'tab-track-number'
        ],

    ];

    protected $listeners = [
        'from' => 'from',
        'to' => 'to',
        'applyDimensions' => 'applyDimensions',
        'applyStandardDimensions' => 'applyStandardDimensions',
        'calculateDelivery' => 'calculateDelivery',
        'calculateDeliveries' => 'calculateDeliveries',
        'onStreetFrom' => 'onStreetFrom',
        'onStreetTo' => 'onStreetTo',
        'onSaveAndNewCalculation' => 'onSaveAndNewCalculation',
        'onSaveAndChoosePayment' => 'onSaveAndChoosePayment',
        'onCalculateCheckout' => 'onCalculateCheckout',
        'onDeleteDeparture' => 'onDeleteDeparture',
    ];

    public $cityFrom;

    public $packages = [];

    public function applyStandardDimensions($dimensionId, $first = false)
    {
        $this->standardDimensionId = $dimensionId;
        $this->dimensionsStr = $this->standardPackages[$dimensionId]['title'];
        $this->length = $this->standardPackages[$dimensionId]['length'];
        $this->width = $this->standardPackages[$dimensionId]['width'];
        $this->height = $this->standardPackages[$dimensionId]['height'];
        $this->weight = $this->standardPackages[$dimensionId]['weight'];
        $this->calculateDeliveries($first);
    }

    public function updatedTariff($tariff)
    {
        $tariffKey = array_search($tariff, array_column($this->tariffs, 'id'));
        $tariff = $this->tariffs[$tariffKey];
        $this->tariffCode = $tariff['code'];
        $this->price = $tariff['calc']['price'];
        $this->mindeliverydays = $tariff['calc']['mindeliverydays'];
        $this->maxdeliverydays = $tariff['calc']['maxdeliverydays'];
        $this->deliverydaysString = $tariff['desc'];

//        dump($tariff);
    }

    public function calc()
    {
        $payload = [
            'sender' => $this->fromStr,
            'receiver' => $this->toStr,
            'packages' => $this->packages
        ];

        $this->price = 0;

        if (count($this->tariffs))
            foreach ($this->tariffs as $key => $tariff) {
                $payload['service'] = $tariff['code'];
                $request = Courier::calculatePackages($payload);
                $this->tariffs[$key]['calc'] = $request;
                $this->tariffs[$key]['desc'] = !empty($request)
                    ? "от {$request['mindeliverydays']} до {$request['maxdeliverydays']} дней, {$request['price']}₽"
                    : "Недоступен";

                if ($tariff['code'] == $this->tariffCode) {
                    $this->price = $request['price'];
                }
            }
    }




    public function unsetDimensions()
    {
        $this->weight = null;
        $this->length = null;
        $this->width = null;
        $this->height = null;
        $this->volumedWeight = null;
        $this->dimensionsStr = null;
    }

    public function calculateDeliveries($first = false, $desc = '')
    {
        $data = [
            'mass' => $this->weight,
            'length' => $this->length / 10,
            'width' => $this->width / 10,
            'height' => $this->height / 10,
            'volumedWeight' => $this->volumedWeight,
            'description' => $this->dimensionsStr ?? 'Точный размер'
        ];

        $first ? $this->packages[0] = $data : $this->packages[] = $data;

        $this->calc();

        $this->radio = 'tab-tariff';

        $this->unsetDimensions();
    }

    public function deletePackage($key)
    {
        array_splice($this->packages, $key, 1);
        $this->calc();
    }

    public function copyLast()
    {
        $this->packages[] = end($this->packages);
        $this->calc();
    }

    public function deleteAll()
    {
        $this->packages = [];
        $this->price = 0;
        $this->unsetDimensions();
    }


    public function makeDeparture()
    {
        $order = [
            'sender' => [
                'person' => $this->nameFrom,
                'phone' => $this->phoneFrom,
                'town' => $this->townFromArray['code'],
                'address' => $this->streetFrom . '' . $this->buildingFrom . ' ' . $this->apartmentFrom,
//                'date' => date('Y-m-d')
            ],
            'receiver' => [
                'person' => $this->nameTo,
                'phone' => $this->phoneTo,
                'town' => $this->townToArray['code'],
                'address' => $this->streetTo . '' . $this->buildingTo . ' ' . $this->apartmentTo,
//                'date' => date('Y-m-d')
            ],
            'packages' => [],
            'instruction' => $this->comment,
            'return' => $this->refund ? 'YES' : 'NO',
            'price' => $this->price,
            'inshprice' => $this->insuranceCost,
            // 'courier', //  Запланированный курьер. Согласно коду курьера в КС2008.
            'custom' => [
                'town_from' => $this->fromStr,
                'town_to' => $this->toStr,
                'mindeliverydays' => $this->mindeliverydays,
                'maxdeliverydays' => $this->maxdeliverydays,
                'package_cost' => $this->packagesCost,
            ]
        ];

        foreach ($this->packages as $package) {
            $order['packages'][] = [
                'mass' => $package['mass'],
                'length' => $package['length'],
                'width' => $package['width'],
                'height' => $package['height'],
            ];
        }

        if (request()->session()->has('departures')) {
            $this->departures = request()->session()->get('departures');
        }

        $this->departures[] = $order;
        request()->session()->put('departures', $this->departures);
    }

    public function makeOrder()
    {
        foreach ($this->departures as $order) {
            Courier::order($order);
        }
    }

    public function finishOrder(){

        $resp = [];

        foreach ($this->departures as $departure){
            unset($departure['custom']);
            $resp[] =  Courier::order($departure);
        }

        request()->session()->put('orders',$resp);


        if($this->routeName === 'calculator') {
            redirect()->route('tracking-number');
        } else {
            /*personal*/
            $this->radio = 'tab-track-number';
        }










    }


    /*services*/
    public function boot()
    {
        $this->cities = new CitiesList();
    }

    public function mount()
    {
        $this->routeName = \Route::currentRouteName();
        $this->standardPackages = PropsStandardDimensions::where('active', 1)
            ->get()->keyBy('id')->toArray();

        if (config('app.env') == 'local') {
            $this->testData();
        }
    }

    public function onSaveAndNewCalculation()
    {
        redirect()->route($this->routeName);
    }

    public function onSaveAndChoosePayment()
    {
        $this->radio = 'tab-payment';

    }

    public function makeTotal()
    {
        $departures = request()->session()->get('departures');
        $prices = array_sum(array_column($departures, 'price'));
        $insurances = array_sum(array_column($departures, 'inshprice'));

        request()->session()->put('total', (int)$prices + (int)$insurances);
    }

    public function onCalculateCheckout()
    {
        $this->makeDeparture();
        $this->makeTotal();


//        $this->redirect('/personal/calculate');
        $this->radio = 'tab-checkout';
    }

    public function onDeleteDeparture($departureKey)
    {
        array_splice($this->departures, $departureKey, 1);
        request()->session()->put('departures', $this->departures);
        $this->makeTotal();
//        dump($departureKey);
//        dump($this->departures);

    }


    public function render()
    {
        $this->departures = request()->session()->get('departures');
        return view('livewire.calculator-page')->with([
            'constants' => Values::all(),
            'departures' => $this->departures
        ]);
    }


    public function testData()
    {
        // step 1
        $this->fromStr = "Москва город";
        $this->dimensionsStr = "Коробка маленькая";
        $this->fromList = [];
        $this->fromStr = "Москва город";
        $this->height = 200;
        $this->length = 200;
        $this->mass = "";
        $this->price = null;
        $this->radio = "tab-calc";
        $this->req = null;
        $this->standardDimensionId = 2;
        $this->toList = [];
        $this->toStr = "Санкт-Петербург город";
        $this->townFrom = null;

        $this->townFromArray = [
            'city' => [
                'code' => '77',
                'name' => 'Город Москва',
            ],
            'code' => 1,
            'coords' => [
                '@attributes' => [
                    'lat' => "55.7507",
                    'lon' => "37.6177",
                ],
                'fiascode' => "0c5b2444-70a0-4932-980c-b4dc0d3f02b5",
                'kladrcode' => "7700000000000",
                'name' => "Москва город",
            ]
        ];
        $this->townToArray = [
            'city' => [
                'code' => '78',
                'name' => 'Город Санкт-Петербург',
            ],
            'code' => 153361,
            'coords' => [
                '@attributes' => [
                    'lat' => "59.9387",
                    'lon' => "30.3162",
                ],
                'fiascode' => "c2deb16a-0330-4f05-821f-1d09c93331e6",
                'kladrcode' => "7800000000000",
                'name' => "Санкт-Петербург город",
            ]
        ];

        $this->weight = 3.9;
        $this->width = 200;

        // steps 2..
        $this->streetFromData = [
            'code' => "2297836",
            'name' => "2-я Сокольническая ул.",
            'shortname' => "2-я Сокольническая",
            'typename' => "ул.",
        ];

        $this->streetToData = [
            'code' => "818053",
            'name' => "Малый Сампсониевский проспект",
            'shortname' => "Малый Сампсониевский",
            'typename' => "проспект",
        ];

        $this->nameFrom = "Петров";
        $this->nameTo = "Баширов";

        $this->emailFrom = "petrov@mail.ru";
        $this->emailTo = "bashirov@mail.ru";

        $this->apartmentFrom = "2";
        $this->apartmentTo = "11";

        $this->buildingFrom = "2";
        $this->buildingTo = "3";

        $this->corpusFrom = "1";
        $this->corpusTo = "2";

        $this->phoneFrom = "+79999990101";
        $this->phoneTo = "+78888880101";

        $this->streetFrom = "2-я Сокольническая ул.";
        $this->streetTo = "Малый Сампсониевский проспект";

    }


}
