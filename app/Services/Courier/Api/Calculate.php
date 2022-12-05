<?php

namespace App\Services\Courier\Api;

class Calculate extends MeasoftApi
{
    public function structure(array $params): array
    {

        return [
            [
                'tag' => 'calculator',
                'elements' => [

                    $this->credentials,

                    [
                        'tag' => 'order',
                        'elements' => [
                            [
                                'tag' => 'pricetype',
                                'content' => 'CUSTOMER'
                            ],
                            [
                                'tag' => 'sender',
                                'elements' => [
                                    [
                                        'tag' => 'town',
                                        'content' => $params['sender']
                                    ]
                                ]
                            ],
                            [
                                'tag' => 'receiver',
                                'elements' => [
                                    [
                                        'tag' => 'town',
                                        'content' => $params['receiver']
                                    ]
                                ]
                            ],
                            [
                                'tag' => 'service',
                                'content' => $params['service'] ?? 2
                            ],
                            [
                                'tag' => 'weight',
                                'content' => $params['mass']
                            ],
                            [
                                'tag' => 'packages',
                                'elements' => [
                                    [
                                        'tag' => 'package',
                                        'attributes' => [
                                            'mass' => $params['mass'],
                                            'length' => $params['length'],
                                            'width' => $params['width'],
                                            'height' => $params['height'],
                                        ],
                                    ],
                                ]
                            ],
                        ],
                    ]
                ]
            ]
        ];

    }

}
