<?php

namespace App\View\Components\Blocks;

use Illuminate\View\Component;

class TabsWidget extends Component
{
    public $tabs = [
        ['title' =>  'Калькулятор', 'name' => 'TabCalculator'],
        ['title' =>  'Отследить посылку', 'name' => 'TabTracking']
    ];

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }



    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.blocks.tabs-widget')->with(['tabs' => $this->tabs]);
    }
}
