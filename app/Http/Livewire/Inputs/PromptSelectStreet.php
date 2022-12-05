<?php

namespace App\Http\Livewire\Inputs;

use App\Services\Courier\Courier;
use Livewire\Component;

class PromptSelectStreet extends Component
{


    protected $listeners = [
        'onFreshPromptSelectStreet' => 'onFreshPromptSelectStreet',
        'onUpdatePromptSelectStreet' => 'onUpdatePromptSelectStreet',
        'onCityEmitted' => 'onCityEmitted',
    ];


    /*FROM*/
    public $streetSearch = '';
    public $streetsList = [];
    public $streetArray;
    public $placeholder;
    public $city_id;

    public function updatedStreetSearch() {
        if (mb_strlen($this->streetSearch) >= 3 && $this->city_id) {
            $this->streetsList = Courier::streets(['namecontains' => $this->streetSearch, 'town' => $this->city_id]);
        } else {
            $this->streetsList = [];
        }
    }

    /*town from*/
    public function setStreet($streetKey)
    {
        $key = array_search($streetKey, array_column($this->streetsList, 'code'));
        $this->streetArray = $this->streetsList[$key];
        $this->streetSearch = $this->streetArray['name'];
        $this->streetsList = [];
        $this->emit('onStreetEmitted',$this->streetArray);

    }

    public function onFreshPromptSelectStreet() {
        $this->streetSearch = '';
        $this->streetsList = [];
        $this->streetArray = null;
    }

    public function onUpdatePromptSelectStreet($city_id,$street_id,$street_name) {
//        $this->streetArray = Courier::streets(['namecontains' => $code,'town' => $code]);
        $this->city_id = $city_id;
        $this->streetSearch = $street_name;
        $this->streetsList = [];
    }

    public function onCityEmitted($cityArray) {
        $this->city_id = $cityArray['code'];
    }

    public function backSpace() {
        $this->streetArray = null;
    }


    public function render()
    {
        return view('livewire.inputs.prompt-select-street');
    }
}
