<?php

namespace App\View\Components\Blocks;

use Illuminate\View\Component;

class ExpressDelivery extends Component
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

    public function expressDelivery() {
        return \App\Models\UI\ExpressDelivery::where('active',1)->orderBy('order')->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.blocks.express-delivery')->with([
            'expressDeliveries' => $this->expressDelivery()
        ]);
    }
}
