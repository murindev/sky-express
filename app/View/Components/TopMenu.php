<?php

namespace App\View\Components;

use App\Models\Pages\PageAddServices;
use App\Models\Pages\PageIndividual;
use App\Models\Pages\PageLegal;
use App\Models\Pages\PageServices;
use Illuminate\View\Component;

class TopMenu extends Component
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
        return view('components.top-menu')->with([
            'individuals' => PageIndividual::where('active', 1)->orderBy('order')->get(),
            'legals' => PageLegal::where('active', 1)->orderBy('order')->get(),
            'services' => PageServices::where('active', 1)->orderBy('order')->get(),
            'addServices' => PageAddServices::where('active', 1)->orderBy('order')->get(),
        ]);
    }
}
