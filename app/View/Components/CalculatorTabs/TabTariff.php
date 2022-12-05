<?php

namespace App\View\Components\CalculatorTabs;

use Illuminate\View\Component;

class TabTariff extends Component
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

/*    public function tariff(): array
    {
        return [
            ['id' => 'standard', 'title' => 'Стандарт', 'desc' => '5 раб. дней*, 1500₽', 'code' => 2],
            ['id' => 'express', 'title' => 'Экспресс', 'desc' => '3 раб. дня*, 3500₽', 'code' => 3],
            ['id' => 'express-plus', 'title' => 'Экспресс-плюс', 'desc' => '2 раб. дня*, 4500₽', 'code' => 5]
        ];
    }*/

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.calculator-tabs.tab-tariff');
    }
}
