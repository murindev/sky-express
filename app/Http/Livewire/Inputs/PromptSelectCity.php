<?php

namespace App\Http\Livewire\Inputs;

use App\Services\Courier\Api\CitiesList;
use App\Services\Courier\Courier;
use Livewire\Component;

class PromptSelectCity extends Component
{

    protected $listeners = [
        'onFreshPromptSelectCity' => 'onFreshPromptSelectCity',
        'onUpdatePromptSelectByCode' => 'onUpdatePromptSelectByCode'
    ];

    public $citySearch = '';
    public $citiesList = [];
    public $cityArray;
    public $placeholder;


    public function updatedCitySearch()
    {
        if (mb_strlen($this->citySearch) >= 3) {
            $this->citiesList = Courier::cities(['namestarts' => $this->citySearch]);
        } else {
            $this->citiesList = [];
        }
    }


    /*town from*/
    public function setCity($townKey)
    {
        $key = array_search($townKey, array_column($this->citiesList, 'code'));
        $this->cityArray = $this->citiesList[$key];
        $this->citySearch = $this->cityArray['name'];
        $this->citiesList = [];
        $this->emit('onCityEmitted', $this->cityArray);

    }

    public function onFreshPromptSelectCity()
    {
        $this->citySearch = '';
        $this->citiesList = [];
        $this->cityArray = null;
    }

    public function onUpdatePromptSelectByCode($code)
    {
        $this->cityArray = Courier::citiesByCode(['code' => $code]);
        $this->citySearch = $this->cityArray['name'];
        $this->citiesList = [];
    }

    public function backSpace()
    {
        $this->cityArray = null;
    }


    public function render()
    {
        return view('livewire.inputs.prompt-select-city');
    }
}
