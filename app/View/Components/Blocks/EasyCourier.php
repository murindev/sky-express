<?php

namespace App\View\Components\Blocks;

use Illuminate\View\Component;

class EasyCourier extends Component
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

    public function easyCourier(){
        return \App\Models\UI\EasyCourier::where('active',1)->orderBy('order')->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.blocks.easy-courier')->with([
            'easyCouriers' => $this->easyCourier()
        ]);
    }
}
