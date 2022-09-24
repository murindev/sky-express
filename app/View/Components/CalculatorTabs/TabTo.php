<?php

namespace App\View\Components\CalculatorTabs;

use Illuminate\View\Component;

class TabTo extends Component
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

    public function inputs(): array
    {
        return [
            ['id' => 'city', 'type' => 'select', 'label' => 'Населенный пункт', 'required' => true, 'placeholder' => 'г. Москва', 'hint' => 'Например: Москва, Волгоград и т.д.'],
            ['id' => 'street', 'type' => 'text', 'label' => 'Улица', 'required' => true, 'placeholder' => 'ул. Дибуновская', 'hint' => ''],
            ['id' => 'building', 'type' => 'text', 'label' => 'Дом', 'required' => true, 'placeholder' => '', 'hint' => ''],
            ['id' => 'corpus', 'type' => 'text', 'label' => 'Корпус', 'required' => false, 'placeholder' => '', 'hint' => ''],
            ['id' => 'block', 'type' => 'text', 'label' => 'Строение', 'required' => false, 'placeholder' => '', 'hint' => ''],
            ['id' => 'apartment', 'type' => 'text', 'label' => 'Квартира/офис', 'required' => false, 'placeholder' => '', 'hint' => ''],
            ['id' => 'name', 'type' => 'text', 'label' => 'Имя', 'required' => true, 'placeholder' => '', 'hint' => ''],
            ['id' => 'phone', 'type' => 'phone', 'label' => 'Телефон', 'required' => true, 'placeholder' => '', 'hint' => ''],
            ['id' => 'email', 'type' => 'email', 'label' => 'E-mail', 'required' => false, 'placeholder' => '', 'hint' => ''],
        ];
    }

    public function cities(): array
    {
        return ['Москва', 'Санкт-Петербург', 'Новосибирск', 'Екатеринбург', 'Нижний Новгород', 'Самара'];
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.calculator-tabs.tab-to');
    }
}
