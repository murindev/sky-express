<?php

namespace App\View\Components\Layouts;

use Illuminate\View\Component;
use Illuminate\View\View;

class SelectBox extends Component
{

    public $placeholder;
    public $payload;
    public $current;
    public $t;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct( $payload, $current = false, $placeholder = '', $t = '')
    {
        $this->placeholder = $placeholder;
        $this->payload = $payload;
        $this->current = $current;
        $this->t = $t;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render() : View
    {
        return view('components.layouts.select-box');
    }
}
