<?php

namespace App\Services\Courier\Api;

class Streets extends MeasoftApi
{

    public $sample = "
        <streetlist>
          <conditions>
            <town>Москва город</town>   // ОБЯЗАТЕЛЬНОЕ ПОЛЕ!
            <namecontains>Хохло</namecontains>
            <namestarts>Академика Х</namestarts>
            <name>Академика Хохлова</name>
            <fullname>Академика Хохлова ул.</fullname>
          </conditions>
          <limit>
            <limitfrom>30</limitfrom>
            <limitcount>10</limitcount>
            <countall>YES</countall>
          </limit>
        </streetlist>";

    public function structure(array $params): array
    {
        return [
            [
                'tag' => 'streetlist',
                'elements' => [
                    [
                        'tag' => 'conditions',
                        'elements' => [
                            [
                                'tag' => 'town',
                                'content' => $params['town'],
                            ],
                            [
                                'tag' => 'namecontains',
                                'content' => $params['namecontains'],
                            ]
                        ],
                    ],
                    [
                        'tag' => 'limit',
                        'elements' => [
                            [
                                'tag' => 'limitcount',
                                'content' => $params['limitcount'] ?? 10,
                            ]
                        ],
                    ]
                ],
            ],
        ];
    }
}
