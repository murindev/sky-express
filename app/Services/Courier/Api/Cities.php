<?php

namespace App\Services\Courier\Api;

class Cities extends MeasoftApi
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
 /*                           [
                                'tag' => 'countall',
                                'content' => 'YES',
                            ]*/
                        ],
                    ],
                    [
                        'tag' => 'conditions',
                        'elements' => [
                            [
                                'tag' => 'namestarts',
                                'content' => $params['namestarts'],
                            ]
                        ],
                    ],

                ],
            ]
        ];
    }
}

