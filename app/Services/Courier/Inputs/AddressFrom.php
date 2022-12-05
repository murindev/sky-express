<?php

namespace App\Services\Courier\Inputs;

use App\Services\Courier\Courier;

trait AddressFrom
{

    public $inputsFrom = [
        ['id' => 'city', 'type' => 'select', 'label' => 'Населенный пункт', 'required' => true, 'placeholder' => 'г. Москва', 'hint' => 'Например: Москва, Волгоград и т.д.'],
        ['id' => 'street', 'type' => 'text', 'label' => 'Улица', 'required' => true, 'placeholder' => 'ул. Дибуновская', 'hint' => ''],
        ['id' => 'building', 'type' => 'text', 'label' => 'Дом', 'required' => true, 'placeholder' => '', 'hint' => ''],
        ['id' => 'corpus', 'type' => 'text', 'label' => 'Корпус', 'required' => false, 'placeholder' => '', 'hint' => ''],
        ['id' => 'block', 'type' => 'text', 'label' => 'Строение', 'required' => false, 'placeholder' => '', 'hint' => ''],
        ['id' => 'apartment', 'type' => 'text', 'label' => 'Квартира/офис', 'required' => false, 'placeholder' => '', 'hint' => ''],
        ['id' => 'name', 'type' => 'text', 'label' => 'Имя', 'required' => true, 'placeholder' => '', 'hint' => ''],
        ['id' => 'phone', 'type' => 'phone', 'label' => 'Телефон', 'required' => true, 'placeholder' => '', 'hint' => ''],
        ['id' => 'email', 'type' => 'email', 'label' => 'E-mail', 'required' => false, 'placeholder' => '', 'hint' => ''],
    ];

    /* FROM */

    public $streetFrom = '';
    public $streetFromData;
    public $streetFromList = [];
    public function onStreetFrom() {
        if (mb_strlen($this->streetFrom) >= 3) {
            $this->streetFromList = Courier::streets([
                'town' => $this->fromStr,
                'namecontains' => $this->streetFrom
            ]);
        } else {
            $this->streetFromList = [];
        }

    }

    public function streetFromSave($key) {
        $this->streetFromData = $this->streetFromList[$key];
        $this->streetFrom = $this->streetFromData['name'];
        $this->streetFromList = [];
    }


    public $buildingFrom;
    public $corpusFrom;
    public $blockFrom;
    public $apartmentFrom;
    public $nameFrom;
    public $phoneFrom;
    public $emailFrom;

    /* TO */

    public $streetTo = '';
    public $streetToData;
    public $streetToList = [];
    public function onStreetTo() {
        if (mb_strlen($this->streetTo) >= 3) {
            $this->streetToList = Courier::streets([
                'town' => $this->toStr,
                'namecontains' => $this->streetTo
            ]);
        } else {
            $this->streetToList = [];
        }

    }

    public function streetToSave($key) {
        $this->streetToData = $this->streetToList[$key];
        $this->streetTo = $this->streetToData['name'];
        $this->streetToList = [];
    }


    public $buildingTo;
    public $corpusTo;
    public $blockTo;
    public $apartmentTo;
    public $nameTo;
    public $phoneTo;
    public $emailTo;

}
