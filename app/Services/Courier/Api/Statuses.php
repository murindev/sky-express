<?php

namespace App\Services\Courier\Api;

class Statuses extends MeasoftApi
{

    public function structure(array $params = []): array
    {

        return [
            [
                'tag' => 'statusreq',
                'elements' => [

                    $this->credentials,


/*                    [
                        'tag' => 'order',
                        'elements' => $this->orderNode($params),
                    ]*/
                ]
            ]
        ];
    }
}

