<?php
require_once '../class/MeasoftCourier.php';

$measoft = new MeasoftCourier('test', 'testm', '8');
if ($res = $measoft->waybill(array(
        'orders' => array(
            'order' => array(
                array(
                    'attributes' => array('orderno' => 12345),
                ),
                array(
                    'attributes' => array('orderno' => 12346)
                ),
            )
        ),
        'form' => '1')
)) {
    header("Pragma: public");
    header("Expires: 0");
    header("Accept-Ranges: bytes");
    header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
    header("Content-Type: application/pdf");
    header("Content-Disposition: attachment; filename=order.pdf");
    header("Content-Transfer-Encoding: binary");

    print base64_decode($res);
}
