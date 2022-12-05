<?php

namespace App\Services\Measoft;

/**
 * Базовый класс для обмена данными с АПИ Measoft
 *
 * Created by Measoft 2019
 */
class MeasoftCourier
{
    /**
     * Типы оплаты
     */
    const PAYMENT_TYPE_CASH = 'CASH';
    const PAYMENT_TYPE_CARD = 'CARD';
    const PAYMENT_TYPE_NONE = 'NO';
    const PAYMENT_TYPE_OTHER = 'OTHER';

    /**
     * Значения Да/Нет
     */
    const YES = 'YES';
    const NO = 'NO';

    /**
     * Разрешить исключения в случае ошибок
     * @var bool
     */
    public $enableExceptions = true;

    /**
     * Версия класса
     * @var string
     */
    private $version = '2.0.0';

    /**
     * Учетные данные для авторизации в АПИ
     * @var string
     */
    private $login = null, $password = null, $extracode = null;

    /**
     * Ссылка на АПИ
     * @var string
     */
    private $url = 'https://home.courierexe.ru/api/';

    /**
     * Лог ответов от АПИ
     * @var array
     */
    private $responses = array();

    /**
     * Лог ошибок от АПИ
     * @var array
     */
    private $errors = array();

    public function __construct($login, $password, $extracode)
    {
        $this->login = $login;
        $this->password = $password;
        $this->extracode = $extracode;
    }

    /**
     * Расчет стоимости доставки согласно тарифам КС
     *
     * @param array $params - параметры для расчета
     * @param bool $priceOnly - возврат только стоимости
     * @return integer|array|false - возвращает массив или число стоимости
     */
    public function calculate(array $params, $priceOnly = false)
    {
        if (!isset($params['townto']) || !$params['townto']) {
            return $this->error('Не указан город назначения');
        }

        $data = array(
            'calc' => array(
                'attributes' => array(
                    'mass' => 40,
                    'service' => 2,
                    'length' => 2000,
                    'width' => 200,
                    'height' => 200,
                )
            ));
        foreach ($params as $param => $val) {
            //Исключение для получения расчета всех видов срочности
            if ($param == 'service' && $val === null)
                unset($data['calc']['attributes'][$param]);
            else $data['calc']['attributes'][$param] = $val;
        }

        $cost = array();
        $xml = $this->makeXML('calculator', $data);
        dump($xml);
        $results = $this->sendRequest($xml);
        if (is_object($results) || is_array($results)) foreach ($results as $result) {
            $cost[(int)$result->service] = array(
                'price' => (double)$result->price,
                'days' => array(
                    'min' => (int)$result->mindeliverydays,
                    'max' => (int)$result->maxdeliverydays,
                ),
            );
        } else return $results;

        if ($priceOnly) {
            $cost = array_shift($cost);
            return $cost['price'];
        }

        return $cost;
    }

    /**
     * @param array $order - информация о заказе
     * @param array $items - товары в заказе
     * @return string|false - номер заказа или false в случае ошибки
     */
    public function orderCreate(array $order = array(), array $items = array(), array $packages = array())
    {
        if (empty($order) || empty($items)) {
            return $this->error('Пустой массив заказа');
        }

        $order_items = array();
        $order_packages = array();
        $price = $inshprice = $weight = 0;
        if (!empty($items)) {
            foreach ($items as $item) {
                if (!in_array($item['name'], array('Доставка', 'Скидка', 'Наценка'))) {
                    //Расчёт стоимости всех товаров
                    $price += $item['retprice'] * $item['quantity'];
                    $inshprice += (isset($item['inshprice']) ? (float)$item['inshprice'] : $item['retprice']) * $item['quantity'];

                    //Расчёт массы всех товаров
                    $weight += $item['mass'] * $item['quantity'];
                }

                $attributes = array();
                foreach ($item as $attribute => $value) {
                    switch ($attribute) {
                        case 'article':
                            $value = strip_tags($value);
                            break;
                        case 'barcode':
                            $value = strip_tags($value);
                            break;
                        case 'mass':
                            $value = $value ? (float)$value : 0;
                            break;
                        case 'quantity':
                            $value = $value ? (int)$value : 1;
                            break;
                        case 'retprice':
                            $value = $value ? (float)$value : 0;
                            break;
                        case 'inshprice':
                            $value = $value ? (float)$value : 0;
                            break;
                        case 'type':
                            $value = $value ? (float)$value : 1;
                            break;
                    }

                    $attributes[$attribute] = $value;
                }
                $order_item = array(
                    'attributes' => $attributes,
                    'value' => strip_tags($item['name']),
                );

                $order_items[] = $order_item;
            }
        }

        if (!empty($packages)) {
            foreach ($packages as $package) {
                $attributes = array();
                foreach ($package as $attribute => $value) {
                    switch ($attribute) {
                        case 'strbarcode':
                            $value = strip_tags($value);
                            break;
                        case 'mass':
                            $value = $value ? (float)$value : 0;
                            break;
                    }

                    $attributes[$attribute] = $value;
                }
                $order_package = array(
                    'attributes' => $attributes,
                    'value' => strip_tags($package['name']),
                );

                $order_packages[] = $order_package;
            }
        }

        $data = array();
        foreach ($order as $param => $value) {
            switch ($param) {
                case 'price':
                    $data[$param] = $value ?: $price;
                    break;
                case 'inshprice':
                    $data[$param] = $value ?: $inshprice;
                    break;
                case 'deliveryprice':
                    $data[$param] = $value ?: 0;
                    break;
                case 'discount':
                    $data[$param] = $value ?: 0;
                    break;
                case 'paytype':
                    $data[$param] = $value && in_array($value, $this->getPaymentTypes()) ? $value : self::PAYMENT_TYPE_CASH;
                    break;
                case 'receiverpays':
                    $data[$param] = $value && in_array($value, array(self::YES, self::NO)) ? $value : self::NO;
                    break;

                case 'quantity':
                    $data[$param] = $value ? (int)$value : 1;
                    break;
                case 'weight':
                    $data[$param] = $value ? (float)$value : $weight;
                    break;
                case 'service':
                    $data[$param] = $value ? (int)$value : 1;
                    break;
                case 'type':
                    $data[$param] = $value ? (int)$value : 1;
                    break;

                case 'return':
                    $data[$param] = $value && in_array($value, array(self::YES, self::NO)) ? $value : self::NO;
                    break;
                case 'return_weight':
                    $data[$param] = $value ? (float)$value : $weight;
                    break;
                case 'return_service':
                    $data[$param] = $value ? (int)$value : 1;
                    break;
                case 'return_type':
                    $data[$param] = $value ? (int)$value : 1;
                    break;

                case 'pickup':
                    $data[$param] = $value && in_array($value, array(self::YES, self::NO)) ? $value : self::NO;
                    break;
                case 'acceptpartially':
                    $data[$param] = $value && in_array($value, array(self::YES, self::NO)) ? $value : self::NO;
                    break;

                default:
                    $data[$param] = $value;
            }
        }
        $data['items']['item'] = $order_items;
        $data['packages']['package'] = $order_packages;

        $result = $this->sendRequest($this->makeXML('neworder', [
            'sender' => array('attributes' => array(
                'type' => 4,
                'module' => 'MeasoftClass',
                'module_version' => $this->version,
                'cms_version' => '',
            )),
            'order' => [
                'attributes' => ['orderno' => isset($order['orderno']) ? $order['orderno'] : ''],
                'value' => $data,
            ]
        ]));

        if (isset($result->createorder[0]['orderno'])) {
            return (string)$result->createorder[0]['orderno'];
        }

        return false;
    }

    /**
     * Получение статуса заказа по параметрам
     *
     * @param array $params - параметры поиска
     * @return string|false - текстовый статус заказа или false в случае ошибки
     */
    public function orderStatus($params)
    {
        $statuses = array(
            'NEW' => 'Новый',
            'PICKUP' => 'Забран у отправителя',
            'ACCEPTED' => 'Получен складом',
            'INVENTORY' => 'Инвентаризация',
            'DEPARTURING' => 'Планируется отправка',
            'DEPARTURE' => 'Отправлено со склада',
            'DELIVERY' => 'Выдан курьеру на доставку',
            'COURIERDELIVERED' => 'Доставлен (предварительно)',
            'COMPLETE' => 'Доставлен',
            'PARTIALLY' => 'Доставлен частично',
            'COURIERRETURN' => 'Курьер вернул на склад',
            'CANCELED' => 'Не доставлен (Возврат/Отмена)',
            'RETURNING' => 'Планируется возврат',
            'RETURNED' => 'Возвращен',
            'CONFIRM' => 'Согласована доставка',
            'DATECHANGE' => 'Перенос',
            'NEWPICKUP' => 'Создан забор',
            'UNCONFIRM' => 'Не удалось согласовать доставку',
            'PICKUPREADY' => 'Готов к выдаче',
            'AWAITING_SYNC' => 'Ожидание синхронизации',
        );

        if (!$params) {
            return $this->error('Не указаны параметры поиска');
        }

        $result = $this->sendRequest($this->makeXML('statusreq', $params));
        $attrs = $result->attributes();
        if ($attrs['count'] > 0) {
            $orders = array();
            foreach ($result->order as $order) {
                $attrs = $order->attributes();
                $status = (string)$order->status;
                $orders[(string)$attrs['ordercode']] = isset($statuses[$status]) ? $statuses[$status] : $status;
            }
            return $orders;
        } else
            return $this->error('Заказ не найден');
    }

    /**
     * Получение списка городов по заданному критерию
     *
     * @param array $conditions - условия для поиска
     * @param array $limit - ограничения результатов
     * @param array $search - поиск по кодам, conditions и limit игнорируются
     * @return array|false - найденные города или false в случае ошибки
     */
    public function citiesList(array $conditions = array(), array $limit = array(), array $search = array())
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
        dump($this->makeXML('townlist', $request, false));

        $results = $this->sendRequest($this->makeXML('townlist', $request, false));

        dump($results);

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

    /**
     * Получение списка режимов срочности
     *
     * @return array|false - найденные режимы или false в случае ошибки
     */
    public function servicesList()
    {
        $results = $this->sendRequest($this->makeXML('services', [], true));

        if (!empty($results)) {
            $services = array();
            foreach ($results as $result) {
                $services[(int)$result->code] = (string)$result->name;
            }

            return $services;
        } else {
            return $this->error('Ничего не найдено');
        }
    }

    /**
     * Получение списка номенклатуры
     *
     * @param array $conditions - условия для поиска
     * @return array|false - найденные режимы или false в случае ошибки
     */
    public function itemList(array $conditions = array())
    {
        $results = $this->sendRequest($this->makeXML('itemlist', $conditions, true));

        if (!empty($results)) {
            $items = array();
            foreach ($results as $result) {
                $items[(int)$result->code] = (string)$result->name;
            }

            return $items;
        } else {
            return $this->error('Ничего не найдено');
        }
    }

    /**
     * Получение печатных форм
     *
     * @param array $conditions - условия для поиска
     * @return array|false - найденные режимы или false в случае ошибки
     */
    public function waybill(array $conditions = array())
    {
        $result = $this->sendRequest($this->makeXML('waybill', $conditions, true));

        if (!empty($result)) {
            return (string)$result->content;
        } else {
            return $this->error('Ничего не найдено');
        }
    }

    /**
     * Возвращает массив доступных типов оплаты
     *
     * @return array
     */
    public function getPaymentTypes()
    {
        return array(
            self::PAYMENT_TYPE_CASH,
            self::PAYMENT_TYPE_CARD,
            self::PAYMENT_TYPE_NONE,
            self::PAYMENT_TYPE_OTHER,
        );
    }

    public function __get($name)
    {
        switch ($name) {
            case 'error':
                $value = !empty($this->errors) ? $this->errors[count($this->errors) - 1] : null;
                break;
            case 'response':
                $value = !empty($this->responses) ? $this->responses[count($this->responses) - 1] : null;
                break;
            default:
                $value = null;
        }

        return $value;
    }

    /**
     * Генерирует XML объект из массива
     *
     * @param $action - метод АПИ
     * @param array $data - данные для запроса
     * @param bool $withAuth - использовать авторизацию или нет
     * @return string - XML строка
     */
    private function makeXML($action, $data = array(), $withAuth = true)
    {
        $xml = simplexml_load_string('<?xml version="1.0" encoding="UTF-8"?><' . $action . '/>');
        if ($withAuth) {
            $auth = $xml->addChild('auth');
            $auth->addAttribute('login', $this->login);
            $auth->addAttribute('pass', $this->password);
            $auth->addAttribute('extra', $this->extracode);
        }
//print_r($data);
        if (!empty($data)) {
            foreach ($data as $node => $value) {
                $this->addXMLnode($xml, $node, $value);
            }
        }
//print_r($data);
        return $xml->asXML();
    }

    private function addXMLnode(&$xml, $name, $data)
    {
        $node = $xml->addChild($name, is_array($data) ? (isset($data['value']) && is_scalar($data['value']) ? $data['value'] : null) : $data);
        if (isset($data['attributes'])) {
            foreach ($data['attributes'] as $name => $value) {
                $node->addAttribute($name, $value);
            }
        } elseif (is_array($data)) {
            foreach ($data as $name => $value) {
                if (!is_array($value) || $value !== array_values($value))
                    $this->addXMLnode($node, $name, $value);
                else foreach ($value as $item) {
                    $this->addXMLnode($node, $name, $item);
                }
            }
        }

        if (isset($data['value']) && is_array($data['value'])) {
            foreach ($data['value'] as $name => $value) {
                $this->addXMLnode($node, $name, $value);
            }
        }

        return true;
    }

    /**
     * Отправка запроса к АПИ
     *
     * @param $data - XML с запросом
     * @return SimpleXMLElement|false - XML ответ от сервера или false в случае ошибки
     */
    private function sendRequest($data)
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $this->url);
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
//print_r($contents); die('/');
        if ($headers['http_code'] != 200 || !$contents) {
            return $this->error('Ошибка сервиса');
        }

        $this->responses[] = $contents;
        $xml = simplexml_load_string($contents);

        return $this->checkResponse($xml) ? $xml : false;
    }

    /**
     * Проверка ответа АПИ на ошибки
     *
     * @param $xml - ответ от сервера
     * @return bool - результат проверки
     */
    private function checkResponse($xml)
    {
        if (!($xml instanceof SimpleXMLElement))
            $this->error('Ошибка сервиса');
//print_r($xml);
        if (((($attr = $xml->attributes()) && isset($attr['error']))
                || ($xml->count() && $xml->children() && ($attr = $xml->children()->attributes()) && isset($attr['error'])))
            && (int)$attr['error']
        ) {
            $error = isset($attr['errormsgru']) ? $attr['errormsgru'] : (isset($attr['errormsg']) ? $attr['errormsg'] : (int)$attr['error']);
            return $this->error($error, (int)$attr['error']);
        }

        return true;
    }

    /**
     * Получение текстового сообщение об ошибке по ее коду от АПИ
     *
     * @param $code - код ошибки
     * @return string - текст ошибки
     */
    private function getErrorMessage($code)
    {
        $errors = array(
            0 => 'OK',
            1 => 'Неверный xml',
            2 => 'Широта не указана',
            3 => 'Долгота не указана',
            4 => 'Дата и время запроса не указаны',
            5 => 'Точность не указана',
            6 => 'Идентификатор телефона не указан',
            7 => 'Идентификатор телефона не найден',
            8 => 'Неверная широта',
            9 => 'Неверная долгота',
            10 => 'Неверная точность',
            11 => 'Заказы не найдены',
            12 => 'Неверные дата и время запроса',
            13 => 'Ошибка mysql',
            14 => 'Неизвестная функция',

            15 => 'Тариф не найден',
            18 => 'Город отправления не указан',
            19 => 'Город назначения не указан',
            20 => 'Неверная масса',
            21 => 'Город отправления не найден',
            22 => 'Город назначения не найден',
            23 => 'Масса не указана',
            24 => 'Логин не указан',
            25 => 'Ошибка авторизации',
            26 => 'Логин уже существует',
            27 => 'Клиент уже существует',
            28 => 'Адрес не указан',
            29 => 'Более не поддерживается',
            30 => 'Настройка sip не выполнена',
            31 => 'Телефон не указан',
            32 => 'Телефон курьера не указан',
            33 => 'Ошибка соединения',
            34 => 'Неверный номер',
            35 => 'Неверный номер',
            36 => 'Ошибка определения тарифа',
            37 => 'Ошибка определения тарифа',
            38 => 'Тариф не найден',
            39 => 'Тариф не найден',
        );

        return isset($errors[$code]) ? $errors[$code] : 'Неизвестная ошибка';
    }

    /**
     * Генерация ошибки и запись ее в историю
     *
     * @param $message - сообщение об ошибке
     * @param int $code - код ошибки
     * @return bool
     * //     * @throws MeasoftCourier_Exception
     */
    private function error($message, $code = 0)
    {
        $this->errors[] = $message;
        if ($this->enableExceptions)
//            throw new MeasoftCourier_Exception($message, $code);

            return false;
    }
}

//class MeasoftCourier_Exception extends Exception {}
