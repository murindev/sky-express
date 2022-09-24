<?php

namespace App\View\Components\CalculatorTabs;

use Illuminate\View\Component;

class TabAdd extends Component
{

    public $cases;
    public $switchFrom;
    public $tbl;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->cases = $this->casesInstance();
        $this->switchFrom = $this->switchFromInstance();
        $this->tbl = $this->tblInstance();

    }



    public function casesInstance(): array
    {
        return [
            ['id' => 'box-envelope', 'title' => 'Конверт с документами', 'desc' => '290 х 210 х 10 мм ', 'weight' => 'до 0,5 кг'],
            ['id' => 'box-s', 'title' => 'Коробка маленькая', 'desc' => '200 х 200 х 200 мм ', 'weight' => 'до 4х кг'],
            ['id' => 'box-x', 'title' => 'Коробка средняя', 'desc' => '400 х 400 х 400 мм ', 'weight' => 'до 4х кг'],
            ['id' => 'box-light', 'title' => 'Негабаритный груз', 'desc' => '', 'weight' => ''],
            ['id' => 'box-custom', 'title' => 'Точный размер', 'desc' => '', 'weight' => ''],
        ];
    }


    public function switchFromInstance(): array
    {
        return [
            ['id' => 'name', 'type' => 'text', 'label' => 'Длина, см', 'required' => true, 'placeholder' => '290 мм', 'hint' => ''],
            ['id' => 'name', 'type' => 'text', 'label' => 'Ширина, см', 'required' => true, 'placeholder' => '210 мм', 'hint' => ''],
            ['id' => 'name', 'type' => 'text', 'label' => 'Высота, см', 'required' => true, 'placeholder' => '10 мм', 'hint' => ''],
            ['id' => 'name', 'type' => 'text', 'label' => 'Вес, кг', 'required' => true, 'placeholder' => 'до 0,5 кг', 'hint' => ''],
            ['id' => 'name', 'type' => 'text', 'label' => 'Объемный вес', 'required' => true, 'placeholder' => 'n/a', 'hint' => 'Объемный вес рассчитывается путем умножения длины в сантиметрах на ширину в сантиметрах на длину в сантиметрах.']
        ];
    }

    public function tblInstance(): array
    {
        return [
            ['col1' => '1', 'col2' => 'Конверт с документами', 'col3' => '200 x 100 x 10 мм', 'col4' => '20 кг', 'col5' => 'n/a'],
            ['col1' => '2', 'col2' => 'Коробка средняя', 'col3' => '400 x200 x 10 мм', 'col4' => '60 кг', 'col5' => 'n/a'],
        ];
    }



    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.calculator-tabs.tab-add');
    }
}
