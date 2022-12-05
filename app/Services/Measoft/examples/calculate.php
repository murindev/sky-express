<?php
require_once '../class/MeasoftCourier.php';

$measoft = new MeasoftCourier('test', 'testm', '391');
$res = $measoft->calculate(array(
'townfrom' => 'Москва',
'townto' => 'Санкт-Петербург',
'service' => null,
));

echo '<pre>';
print_r($res);
echo '</pre>';
