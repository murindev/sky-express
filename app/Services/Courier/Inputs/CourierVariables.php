<?php

namespace App\Services\Courier\Inputs;

use App\Models\Settings\Values;
use App\Services\Courier\Courier;

trait CourierVariables
{
    private $cities;

    public $testMessage;
    public $standardPackages;

    /*FROM*/
    public $fromStr = '';
    public $fromList = [];
    public $townFrom;
    public $townFromArray;
    /*TO*/
    public $toStr = '';
    public $toList = [];
    public $townTo;
    public $townToArray;

//    public $townto = '';
    public $mass = '';

    /*Размер отправления*/
    public $length;
    public $width;
    public $height;
    public $weight;
    public $volumedWeight;
    public $dimensionsStr = 'Размер отправления';
    public $standardDimensionId;

    /* комментарий и дополнительные услуги */
    public $comment = '';
    public $insurance = false;
    public $packagesCost = 0;
    public $insuranceCost = 0;
    public $refund = false;

    /*расчет*/
    public $price;
    public $req;

    /*сроки*/

    public $mindeliverydays;
    public $maxdeliverydays;
    public $deliverydaysString;

    /*тарифы*/
    public $tariff = 'standard';
    public $tariffCode = 2;
    public $tariffs = [
        ['id' => 'standard', 'title' => 'Стандарт', 'desc' => '5 раб. дней*, 1500₽', 'code' => 2, 'active' => false],
        ['id' => 'express', 'title' => 'Экспресс', 'desc' => '3 раб. дня*, 3500₽', 'code' => 3, 'active' => true],
        ['id' => 'express-plus', 'title' => 'Экспресс-плюс', 'desc' => '2 раб. дня*, 4500₽', 'code' => 5, 'active' => false]
    ];



    /*направления*/

    public $departures = [];



    /*способ оплаты*/

    public $measoftPayType = [
        'CASH', // Наличными при получении (по-умолчанию)
        'CARD', // Картой при получении
        'NO', // Без оплаты. Этот тип оплаты передается, если заказ уже оплачен и не требует инкассации. API добавит к товарам строку предоплаты в сумму заказа, чтобы общая сумма была 0, однако в кассовом чеке будут все товары с ценами, и оплата предоплатой, как того требует 54-ФЗ.
        'OTHER', // Прочее (Предусмотрен для того, чтобы оплата поступала непосредственно в курьерскую службу посредством прочих типов оплаты — таких, как: вебмани, яденьги, картой на сайте, прочие платежные системы и т. д.)
        'OPTION', // На выбор получателя. Этот тип оплаты нельзя передавать с заказом. Он выставляется автоматически в зависимости от настройки клиента.
    ];

    public $payType = 'CASH';

    /*town from*/
    public function setTownFrom($townKey)
    {
        $key = array_search($townKey, array_column($this->fromList, 'code'));
        $this->townFromArray = $this->fromList[$key];
        $this->fromStr = $this->townFromArray['name'];
        $this->fromList = [];
    }

    public function from()
    {
        if (mb_strlen($this->fromStr) >= 3) {
            $this->fromList = Courier::cities(['namestarts' => $this->fromStr]);
        } else {
            $this->fromList = [];
        }

    }

    public $tra = 'tra tra tra';

    public function tests($str)
    {
        return Courier::cities(['namestarts' => $str]);
    }

    /*town to*/
    public function setTownTo($townKey)
    {
        $key = array_search($townKey, array_column($this->toList, 'code'));
        $this->townToArray = $this->toList[$key];
        $this->toStr = $this->townToArray['name'];
        $this->toList = [];
    }

    public function to()
    {
        if (mb_strlen($this->toStr) >= 3) {
            $this->toList = Courier::cities(['namestarts' => $this->toStr]);
        } else {
            $this->toList = [];
        }
    }

    public function changeDirection()
    {
        $this->testMessage = 'changeDirection';
        $tempFrom = $this->townFromArray;
        $this->townFromArray = $this->townToArray;
        $this->fromStr = $this->townFromArray['name'];
        $this->townToArray = $tempFrom;
        $this->toStr = $this->townToArray['name'];
    }

    public function applyDimensions($data)
    {
        $this->length = $data['length'];
        $this->width = $data['width'];
        $this->height = $data['height'];
        $this->weight = $data['weight'];
        if (isset($data['volumedWeight'])) {
            $this->volumedWeight = $data['volumedWeight'];
        }

        $this->dimensionsStr = $this->length . ' x ';
        $this->dimensionsStr .= $this->width . ' x ';
        $this->dimensionsStr .= $this->height . ' мм до ';
        $this->dimensionsStr .= $this->weight . ' кг';
    }

    public function applyStandardDimensions($dimensionId)
    {
        $this->standardDimensionId = $dimensionId;
        $this->dimensionsStr = $this->standardPackages[$dimensionId]['title'];
        $this->length = $this->standardPackages[$dimensionId]['length'];
        $this->width = $this->standardPackages[$dimensionId]['width'];
        $this->height = $this->standardPackages[$dimensionId]['height'];
        $this->weight = $this->standardPackages[$dimensionId]['weight'];
    }

    public function calculateDelivery()
    {
        $request = Courier::calculate([
            'sender' => $this->fromStr,
            'receiver' => $this->toStr,
            'mass' => $this->weight,
            'length' => $this->length * 0, 1,
            'width' => $this->width * 0, 1,
            'height' => $this->height * 0, 1,
        ]);

        $this->price = (string)$request['price'];

    }

    public function updatedInsurance()
    {
        $this->insuranceCost = $this->insurance ? $this->updatedPackagesCost() : 0;
    }

    public function updatedPackagesCost()
    {

        $percent = Values::where('slug', 'insurance')->first();
        $this->insuranceCost = $this->packagesCost / 100 * (int)$percent->value;
        return $this->insuranceCost;

    }


}
