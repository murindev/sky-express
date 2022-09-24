<?php

namespace App\View\Components\Blocks;

use App\Models\UI\PopDepartures;
use Illuminate\View\Component;

class PopularDepartures extends Component
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

    public function departuresList() {
        return PopDepartures::where('active', 1)->orderBy('order')->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.blocks.popular-departures')->with([
            'departures' => $this->departuresList()
        ]);
    }
}
