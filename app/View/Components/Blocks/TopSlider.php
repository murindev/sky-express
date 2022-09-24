<?php

namespace App\View\Components\Blocks;

use App\Admin\Controllers\UI\SliderController;
use App\Models\UI\Slider;
use Illuminate\View\Component;

class TopSlider extends Component
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

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $slides = Slider::whereIn('type',[1,3])->get();
        return view('components.blocks.top-slider')->with(['slides' => $slides]);
    }
}
