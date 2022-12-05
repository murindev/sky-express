<?php

namespace App\Services\Courier\Api;

class CalculatePackages extends MeasoftApi
{
    public function structure(array $params): array
    {

        $packages = [];
        $mass = 0;

        foreach ($params['packages'] as $package) {
            $mass += $package['mass'];
            $item = [
                'tag' => 'package',
                'attributes' => [
                    'mass' => $package['mass'],
                    'length' => $package['length'],
                    'width' => $package['width'],
                    'height' => $package['height'],
                ],
            ];
            $packages[] = $item;
        }

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
                                'content' => $mass
                            ],
                            [
                                'tag' => 'packages',
                                'elements' => $packages
                            ],
                        ],
                    ]
                ]
            ]
        ];

    }

}
