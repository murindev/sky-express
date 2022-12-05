<?php
require_once '../class/MeasoftCourier.php';

$measoft = new MeasoftCourier('ABS', '123456', '391');

if (is_array($res = $measoft->servicesList())) {
    echo '<pre>';
    foreach ($res as $code=>$service) {
        print 'Код ' . $code . ', наименование: ' . $service . "\n";
    }
    echo '</pre>';
}
