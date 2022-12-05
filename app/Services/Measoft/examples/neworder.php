<?php
require_once '../class/MeasoftCourier.php';

$data = array(
    'sender' => array(
        'company' => 'Отправкин',
        'person' => 'Олегов Олег Олегович',
        'phone' => '495 1234567',
        'zipcode' => '644000',
        'town' => 'Омск',
        'address' => 'Огуречная, 1',
        'date' => '',
        'time_min' => '',
        'time_max' => '',
    ),
    'receiver' => array(
        'company' => 'Получайкин',
        'person' => 'Петров Петр Петрович',
        'phone' => '495 2345678',
        'zipcode' => '180000',
        'town' => 'Псков',
        'address' => 'Помидорная, 5',
        'date' => date('Y-m-d'),
        'time_min' => '10:00',
        'time_max' => '16:00',
    ),
    'price' => 1100,
    'inshprice' => 1100,
    'deliveryprice' => 0,
    'discount' => 0,
    'paytype' => 'CARD',
    'receiverpays' => 'NO',

    'quantity' => 1,
    'weight' => 2,
    'service' => 1,
    'type' => 1,

    'return' => 'NO',
    'return_weight' => 0,
    'return_service' => 0,
    'return_type' => 0,

    'enclosure' => 'Описание заказа',
    'instruction' => 'Комментарии к заказу',

    'department' => 'Отдел',
    'pickup' => 'NO',
    'acceptpartially' => 'NO',
    'costcode' => 'cc12345',
);

$items = array(
    array(
        'name' => 'Товар 1',
        'quantity' => 1,
        'mass' => 0.5,
        'retprice' => 100,
        'barcode' => '12345789'
    ),
    array(
        'name' => 'Товар 2',
        'quantity' => 4,
        'mass' => 0.25,
        'retprice' => 250,
        'barcode' => '987654321'
    ),
);

$packages = array(
    array(
        'name' => 'Место 1',
        'mass' => 0.5,
        'strbarcode' => '12345789'
    ),
    array(
        'name' => 'Место 2',
        'mass' => 0.25,
        'strbarcode' => '987654321'
    ),
);

$measoft = new MeasoftCourier('test', 'testm', '8');
$res = $measoft->orderCreate($data, $items, $packages);

echo '<pre>';
print_r($res);
echo '</pre>';
