<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Calculator extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }


    public function steps(): array
    {
        return [
            [
                'nr' => '1',
                'id' => 'tab-calc',
                'active' => true,
                'title' => 'Калькулятор',
                'isTab' => 'tab',
                'component' => 'tab-calc'
            ],

            [
                'nr' => '2',
                'id' => 'tab-tariff',
                'active' => false,
                'title' => 'Выбрать тариф',
                'isTab' => 'tab',
                'component' => 'tab-tariff'
            ],
            [
                'nr' => '3',
                'id' => 'tab-from',
                'active' => false,
                'title' => 'Откуда забрать',
                'isTab' => 'no-tab',
                'component' => 'tab-from'
            ],
            [
                'nr' => '4',
                'id' => 'tab-to',
                'active' => false,
                'title' => 'Куда отправить',
                'isTab' => 'no-tab',
                'component' => 'tab-to'
            ],
            [
                'nr' => '5',
                'id' => 'tab-add',
                'active' => false,
                'title' => 'Добавить посылку',
                'isTab' => 'no-tab',
                'component' => 'tab-add'
            ],
            [
                'nr' => '6',
                'id' => 'tab-services',
                'active' => false,
                'title' => 'Дополнительные услуги',
                'isTab' => 'no-tab',
                'component' => 'tab-services'
            ],
            [
                'nr' => '7',
                'id' => 'tab-checkout',
                'active' => false,
                'title' => 'Оформить заказ',
                'isTab' => 'no-tab',
                'component' => 'tab-checkout'
            ],

        ];
    }




    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.calculator')->with([
            'steps' => $this->steps()
        ]);
    }
}
