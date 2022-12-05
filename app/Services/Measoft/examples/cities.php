<?php
require_once '../class/MeasoftCourier.php';

$measoft = new MeasoftCourier('test', 'testm', '8');
$res = $measoft->citiesList(array('namestarts' => 'Моск'));

echo '<pre>';
print_r($res);
echo '</pre>';
