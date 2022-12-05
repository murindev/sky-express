<?php

namespace App\Http\Livewire\Personal;

use App\Models\PersonalContacts;
use App\Models\Settings\Countries;
use App\Services\Courier\Courier;
use Livewire\Component;

class AddContacts extends Component
{
    protected $listeners = [
        'onCityEmitted' => 'onCityEmitted',
        'onStreetEmitted' => 'onStreetEmitted',
    ];

    public $selectCountryValues = ["id", "name as title"];

    public $search = '';

    public $contact = [
        'fio' => '',
        'organisation' => '',
        'phone' => '',
        'country_id' => 175,
        'city_id' => '',
        'city_name' => '',
        'zip' => '',
        'street_id' => '',
        'street' => '',
        'building' => '',
        'office' => '',
        'info' => '',
    ];


    public function freshContacts()
    {
        foreach ($this->contact as $key => $item) {
            $this->contact[$key] = $key === 'country_id' ? 175 : '';
        }
    }


    public function onCityEmitted($cityArray)
    {
        $this->contact['city_id'] = $cityArray['code'];
        $this->contact['city_name'] = $cityArray['name'];
    }

    public function onStreetEmitted($cityArray)
    {
        $this->contact['street_id'] = $cityArray['code'];
        $this->contact['street'] = $cityArray['shortname'];
        $this->contact['street_type'] = $cityArray['typename'];
    }

    public function getContacts()
    {
        $contacts = PersonalContacts::whereUserId(auth()->user()->id);
        if ($this->search != '') {
            $contacts->where(function ($query) {
                $query->orWhere('fio', 'like', '%' . $this->search . '%')
                    ->orWhere('organisation', 'like', '%' . $this->search . '%')
                    ->orWhere('phone', 'like', '%' . $this->search . '%')
                    ->orWhere('city_name', 'like', '%' . $this->search . '%')
                    ->orWhere('zip', 'like', '%' . $this->search . '%')
                    ->orWhere('street', 'like', '%' . $this->search . '%');
            });
        }
        return $contacts->get();
    }

    /*ACTIONS*/


    /*search*/
    public function updatedSearch()
    {
        $this->getContacts();
    }

    /*add*/
    public function saveContact()
    {
        $this->contact['user_id'] = auth()->user()->id;
        if(array_key_exists('id',$this->contact) && $this->contact['id']) {
            PersonalContacts::updateOrCreate(['id' => $this->contact['id']],$this->contact);
        } else {
            unset($this->contact['id']);
            PersonalContacts::create($this->contact);
        }

        $this->freshContacts();
        $this->emit('onFreshPromptSelectCity');
        $this->emit('onFreshPromptSelectStreet');
    }

    /*edit*/
    public function editContact($id)
    {
        $contact = PersonalContacts::whereId($id)->first()->toArray();
        $this->emit('onUpdatePromptSelectByCode', $contact['city_id']);
        $this->emit('onUpdatePromptSelectStreet', $contact['city_id'], $contact['street_id'], $contact['street']);
        $this->contact['id'] = $contact['id'];
        foreach ($this->contact as $key => $item) {
            $this->contact[$key] = $contact[$key];
        }

    }

    /*delete*/
    public function deleteContact($id) {
        PersonalContacts::whereId($id)->delete();
    }


    public function render()
    {

        return view('livewire.personal.add-contacts', [
            'countries' => Countries::whereActive(1)->select($this->selectCountryValues)->orderBy('order')->get(),
            'country' => Countries::whereId($this->contact['country_id'])->select($this->selectCountryValues)->first(),
        ]);
    }
}

/*
'user_id' => auth()->user()->id,
order
active
*/
