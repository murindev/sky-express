<?php
require_once '../class/MeasoftCourier.php';

$measoft = new MeasoftCourier('login', 'pass', '8');

if (is_array($res = $measoft->itemList(array('conditions' => array('namecontains' => 'шка'))))) {
    echo '<pre>';
    foreach ($res as $code=>$item) {
        print 'Код ' . $code . ', наименование: ' . $item . "\n";
    }
    echo '</pre>';
}
