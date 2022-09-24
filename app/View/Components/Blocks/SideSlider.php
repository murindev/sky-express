<?php

namespace App\View\Components\Blocks;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;

class SideSlider extends Component
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

    public function render()
    {
        $slides = \App\Models\UI\SideSlider::where('active',1);

        return view('components.blocks.side-slider')->with([
            'slides' => $slides->orderBy('order')->get(),
            'slidesCount' => $slides->count()
        ]);
    }
}
