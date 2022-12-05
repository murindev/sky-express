<?php

namespace App\Services\Courier;

use App\Services\Courier\Api\Calculate;
use App\Services\Courier\Api\CalculatePackages;
use App\Services\Courier\Api\Cities;
use App\Services\Courier\Api\CitiesByCode;
use App\Services\Courier\Api\Delete;
use App\Services\Courier\Api\Order;
use App\Services\Courier\Api\Statuses;
use App\Services\Courier\Api\Streets;
use App\Services\Measoft\MeasoftCourier;
use SimpleXMLElement;

class Courier
{

    public $courier;
    const url = 'https://home.courierexe.ru/api/';
    const enableExceptions = true;


    public static function sendRequest($data)
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, self::url);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: text/xml; charset=utf-8'));
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $contents = curl_exec($ch);
        $headers = curl_getinfo($ch);
        curl_close($ch);

        if ($headers['http_code'] != 200 || !$contents) {
            return self::error('Ошибка сервиса');
        }

//        self::responses[] = $contents;
        $xml = simplexml_load_string($contents);

        return self::checkResponse($xml) ? $xml : false;
    }

    protected static function error($message, $code = 0)
    {
//        self::errors[] = $message;
        if (self::enableExceptions)
//            throw new MeasoftCourier_Exception($message, $code);
            return false;
    }

    /**
     * Проверка ответа АПИ на ошибки
     *
     * @param $xml - ответ от сервера
     * @return bool - результат проверки
     */
    protected static function checkResponse($xml): ?bool
    {
        if (!($xml instanceof SimpleXMLElement))
           return self::error('Ошибка сервиса');
//print_r($xml);
        if (((($attr = $xml->attributes()) && isset($attr['error']))
                || ($xml->count() && $xml->children() && ($attr = $xml->children()->attributes()) && isset($attr['error'])))
            && (int)$attr['error']
        ) {
            $error = $attr['errormsgru'] ?? (isset($attr['errormsg']) ? $attr['errormsg'] : (int)$attr['error']);
            return self::error($error, (int)$attr['error']);
        }

        return true;
    }

    public static function toArray($xml) : array
    {
        if($xml) {
            $json = json_encode($xml);
            return json_decode($json, true);
        } else {
            return [];
        }

    }

    public static function calculate($params): array
    {
        $request = new Calculate($params);
        $result = self::toArray(self::sendRequest($request->output));
        return $result['calc'] ?? [];
    }

    public static function calculatePackages($params): array
    {
        $request = new CalculatePackages($params);
        $result = self::toArray(self::sendRequest($request->output));
        return $result['calc'] ?? [];
    }

    public static function cities($params): array
    {
        $request = new Cities($params);
        $result = self::toArray(self::sendRequest($request->output));
        return $result['town'] ?? [];
    }

    public static function citiesByCode($params): array
    {
        $request = new CitiesByCode($params);
        $result = self::toArray(self::sendRequest($request->output));
        return $result['town'] ?? [];
    }

    public static function streets($params): array
    {
        $request = new Streets($params);
        $result = self::toArray(self::sendRequest($request->output));
        return $result['street'] ?? [];
    }

    public static function order($params)
    {
        $request = new Order($params);
        $result = self::toArray(self::sendRequest($request->output));
        return $result['createorder']['@attributes'] ?? [];
    }

    public static function statuses($params = [])
    {
        $request = new Statuses($params);

        $result = self::toArray(self::sendRequest($request->output));
        return $result ?? [];
    }

    public static function delete($params = [])
    {
        $request = new Delete($params);
        dd($request);
        $result = self::toArray(self::sendRequest($request->output));
//        dd($result);
        return $result ?? [];
    }

}
