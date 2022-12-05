<?php

namespace App\Http\Livewire;

use App\Models\Props\PropsStandardDimensions;
use App\Services\Courier\Api\Calculate;
use App\Services\Courier\Api\CitiesList;
use App\Services\Courier\Inputs\CourierVariables;
use Livewire\Component;

class CalculatorWidget extends BaseComponent
{


    use CourierVariables;

    protected $listeners = [
        'from' => 'from',
        'to' => 'to',
        'applyDimensions' => 'applyDimensions',
        'applyStandardDimensions' => 'applyStandardDimensions',
        'calculateDelivery' => 'calculateDelivery',
    ];

    /*services*/
    public function boot()
    {
        $this->cities = new CitiesList();
    }

    public function mount()
    {
        $this->standardPackages = PropsStandardDimensions::where('active', 1)
            ->get()->keyBy('id')->toArray();
    }

    public function render()
    {
        return view('livewire.calculator-widget');
    }
}
