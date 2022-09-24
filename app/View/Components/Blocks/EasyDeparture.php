<?php

namespace App\View\Components\Blocks;

use Illuminate\View\Component;

class EasyDeparture extends Component
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

    public function easyDepartures() {
        return \App\Models\UI\EasyDeparture::where('active',1)->orderBy('order')->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.blocks.easy-departure')->with([
            'easyDepartures' => $this->easyDepartures()
        ]);
    }
}
