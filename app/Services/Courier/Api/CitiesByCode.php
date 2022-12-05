<?php

namespace App\Services\Courier\Api;

class CitiesByCode extends MeasoftApi
{

    public function structure(array $params): array
    {

        return [
            [
                'tag' => 'townlist',
                'elements' => [
                    [
                        'tag' => 'limit',
                        'elements' => [
                            [
                                'tag' => 'limitcount',
                                'content' => 10,
                            ],
                        ],
                    ],
                    [
                        'tag' => 'codesearch',
                        'elements' => [
                            [
                                'tag' => 'code',
                                'content' => $params['code'],
                            ]
                        ],
                    ],

                ],
            ]
        ];
    }
}

