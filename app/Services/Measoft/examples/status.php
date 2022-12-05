<?php
require_once '../class/MeasoftCourier.php';

$measoft = new MeasoftCourier('test', 'testm', '8');

//Поиск по шифру заказа
if (is_array($res = $measoft->orderStatus(['orderno' => '0000318935']))) {
    echo '<pre>';
    foreach ($res as $code=>$status) {
        print 'Заказ ' . $code . ', статус: ' . $status . "\n";
    }
    echo '</pre>';
}

//Поиск по коду заказа
if (is_array($res = $measoft->orderStatus(['ordercode' => '3468647']))) {
    echo '<pre>';
    foreach ($res as $code=>$status) {
        print 'Заказ ' . $code . ', статус: ' . $status . "\n";
    }
    echo '</pre>';
}

//Поиск по дате заказа
if (is_array($res = $measoft->orderStatus(['datefrom' => '2021-07-20', 'dateto' => '2021-07-25']))) {
    echo '<pre>';
    foreach ($res as $code=>$status) {
        print 'Заказ ' . $code . ', статус: ' . $status . "\n";
    }
    echo '</pre>';
}

//Поиск только изменившихся статусов
if (is_array($res = $measoft->orderStatus(['changes' => 'ONLY_LAST']))) {
    echo '<pre>';
    foreach ($res as $code=>$status) {
        print 'Заказ ' . $code . ', статус: ' . $status . "\n";
    }
    echo '</pre>';
}
