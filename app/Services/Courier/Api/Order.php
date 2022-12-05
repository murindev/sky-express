<?php

namespace App\Services\Courier\Api;

class Order extends MeasoftApi
{

    public function structure(array $params): array
    {
        return [
            [
                'tag' => 'neworder',
                'elements' => [

                    $this->credentials,


                    [
                        'tag' => 'order',
                        'elements' => $this->orderNode($params),
                    ]
                ]
            ]
        ];
    }

    public function orderNode($params) : array
    {
        $result = [];
        $result[] = [
            'tag' => 'sender',
            'elements' => $this->simpleNode($params['sender']),
        ];


        $result[] = [
            'tag' => 'receiver',
            'elements' => $this->simpleNode($params['receiver']),
        ];
        $result[] = [
            'tag' => 'packages',
            'elements' => $this->packages($params['packages']),
        ];


        foreach ($params as $key => $val) {
            if (is_string($val) || is_numeric($val)) {
                $result[] = [
                    'tag' => $key,
                    'content' => $val,
                ];
            }
        }

        return $result;
    }


    public function structureFull(array $params): array
    {

        $arr = [
            'neworder' => [
                'attributes' => ['newfolder' => "NO"],
                'auth' => [],
                'order' => [
                    'barcode' => '111111',
                    'sender' => [
                        'company' => ['content' => ''],
                        'person' => ['content' => ''],
                        'phone' => ['content' => ''],
                        'town' => ['content' => ''],
                        'address' => ['content' => ''],
                        'date' => ['content' => ''],
                        'time_min' => ['content' => ''],
                        'time_max' => ['content' => ''],
                    ],
                    'receiver' => [
                        'company' => ['content' => ''], // Должно быть заполнено хотя бы одно из полей — company или person!
                        'person' => ['content' => ''],
                        'phone' => ['content' => ''],
                        'zipcode' => ['content' => ''],
                        'town' => [
                            'attrbutes' => ['regioncode' => '78', 'country' => 'RU',],
                            'content' => 'Санкт-Петербург'
                        ],
                        'address' => ['content' => 'Петровка 38 офис 35'],
                        'pvz' => ['content' => '124'],
                        'inn' => ['content' => '1112223335'],
                        'date' => ['content' => ''],
                        'time_min' => ['content' => ''],
                        'deliveryPIN' => ['content' => ''],
                        'coords' => [
                            'attrbutes' => ['regioncode' => '78', 'country' => 'RU',]
                        ],
                    ],
                    'price' => ['content' => '387.5'],
                    'inshprice' => ['content' => '387.5'],
                    'deliveryprice' => ['attrbutes' => ['VATrate' => '20'], 'content' => ''],
                    'discount' => ['content' => ''],
                    'paytype' => ['content' => ''],
                    'weight' => ['content' => ''],
                    'quantity' => ['content' => ''],
                    'service' => ['content' => ''],
                    'type' => ['content' => ''],
                    'return' => ['content' => ''],
                    'return_service' => ['content' => ''],
                    'return_type' => ['content' => ''],
                    'return_weight' => ['content' => ''],
                    'courier' => ['content' => ''],
                    'receiverpays' => ['content' => ''],
                    'enclosure' => ['content' => ''],
                    'instruction' => ['content' => ''],
                    'department' => ['content' => ''],
                    'pickup' => ['content' => ''],
                    'acceptpartially' => ['content' => ''],
                    'costcode' => ['content' => ''],
                    'respstore' => ['content' => ''],
                    'items' => [
                        'item' => [
                            'content' => 'Мяч',
                            'attrbutes' => [
                                'extcode' => 'abc123',
                                'quantity' => '1',
                                'mass' => '0.2',
                                'retprice' => '37.5',
                                'VATrate' => '0',
                                'barcode' => '2345625213125',
                                'textArticle' => '1',
                                'article' => '1',
                                'volume' => '3',
                                'origincountry' => 'AUT',
                                'GTD' => '321546654',
                                'excise' => '15.20',
                                'suppcompany' => 'ООО &quot;Рога и копыта&quot;',
                                'suppphone' => '79161234567',
                                'suppINN' => '1112223334',
                                'governmentCode' => '11223311',
                            ]
                        ], // <=>

                    ],
                    'packages' => [
                        'package' => [
                            'attrbutes' => [
                                'strbarcode' => 'ORD0000002',
                                'mass' => '2.5',
                                'message' => 'message message',
                                'length' => '20',
                                'width' => '20',
                                'height' => '20',
                            ]
                        ] // <=>
                    ],
                    'deliveryset' => [
                        'attrbutes' => [
                            'above_price' => 100,
                            'return_price' => 1000,
                            'VATrate' => 10,
                        ],
                        'elements' => [
                            'below' => [
                                'attrbutes' => ['below_sum' => 500, 'price' => 500,]
                            ] // <=>
                        ]
                    ],
                    'advprices' => [
                        'advprice' => [
                            'code' => ['content' => ''],
                            'value' => ['content' => ''],
                        ]
                    ],
                    'overall_volume' => ['elements' => '81'],
                    'userid' => ['elements' => 'user123'],
                    'groupid' => ['elements' => 'customer'],
                ]
            ]
        ];

        return $arr;
    }

    public function simpleNode(array $data): array
    {
        $result = [];


        foreach ($data as $key => $val) {
            $result[] = [
                'tag' => $key,
                'content' => $val,
            ];
        }

        return $result;
    }

    public function node(array $data): array
    {
        $result = [];
        foreach ($data as $key => $val) {
            if (is_string($val) || is_numeric($val)) {
                $result[] = [
                    'tag' => $key,
                    'content' => $val,
                ];
            }
        }

        return $result;
    }

    public function packages(array $packages): array
    {
        $result = [];

        foreach ($packages as $key => $val) {
            $result[] = [
                'tag' => 'package',
                'attributes' => $val,
            ];
        }

        return $result;
    }

}
