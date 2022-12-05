<?php

namespace App\Services\Courier\Api;

use bupy7\xml\constructor\XmlConstructor;

abstract class MeasoftApi
{
    public $credentials;
    public $output;

    public function __construct($params)
    {
        $this->credentials = $this->getUserCredentials();
        $request = $this->structure($params);
        $this->output = (new XmlConstructor())->fromArray($request)->toOutput();
    }

    protected function getUserCredentials(): array
    {
        $user = auth()->user();
        return [
            'tag' => 'auth',
            'attributes' => [
                'login' => $user ? $user->measoft_login : config('measoft.login'),
                'pass' => $user ? $user->measoft_pass : config('measoft.password'),
                'extra' => $user ? $user->measoft_extra : config('measoft.extracode'),
            ],
        ];
    }


    abstract public function structure(array $params): array;

}
