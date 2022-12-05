<?php

namespace App\Services\Courier\Api;

use App\Services\Courier\Courier;
use bupy7\xml\constructor\XmlConstructor;

class CitiesList extends Courier
{

    public function handle(array $conditions = array(), array $limit = array(), array $search = array())
    {

        if (empty($conditions) && empty($limit) && empty($search)) {
            return $this->error('Не указаны параметры для поиска');
        }

        //Ограничиваем кол-во результатов, если не указано другое
        $request = array('limit' => array('limitcount' => 10));

        if (!empty($conditions)) {
            foreach ($conditions as $condition => $value) {
                $request['conditions'][$condition] = $value;
            }
        }

        if (!empty($limit)) {
            foreach ($limit as $option => $value) {
                switch ($option) {
                    case 'countall':
                        $request['limit'][$option] = $value && strtoupper($value) != 'NO' ? 'YES' : 'NO';
                        break;
                    default:
                        $request['limit'][$option] = $value;
                }
            }
        }

        if (!empty($search)) {
            foreach ($search as $field => $value) {
                $request['codesearch'][$field] = $value;
            }
        }

        $results = $this->sendRequest($this->makeXML('townlist', $request, false));

        if (!empty($results)) {
            $cities = array();
            foreach ($results as $result) {
                $cities[(int)$result->code] = array(
                    'code' => (int)$result->code,
                    'name' => (string)$result->name,
                    'fiascode' => (string)$result->fiascode,
                    'kladrcode' => (string)$result->kladrcode,
                    'shortname' => (string)$result->shortname,
                    'typename' => (string)$result->typename,
                    'region' => array(
                        'code' => (int)$result->city->code,
                        'name' => (string)$result->city->name,
                    ),
                );
            }

            return $cities;
        } else {
            return $this->error('Ничего не найдено');
        }
    }

}
