<?php

namespace App\Services\Courier\Api;

class Delete extends MeasoftApi
{

    public function structure(array $params = []): array
    {

        return [
            [
                'tag' => 'cancelorder',
                'elements' => [

                    $this->credentials,

                    [
                        'tag' => 'order',
                        'attributes' => [
                            'orderno' => $params['orderno']
                        ],
                    ]
                ]
            ]
        ];
    }
}
