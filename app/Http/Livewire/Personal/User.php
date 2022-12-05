<?php

namespace App\Http\Livewire\Personal;

use App\Traits\Liveware\UserLive;
use Livewire\Component;

class User extends Component
{

    use UserLive;

    protected $listeners = [
        'edit_user' => 'onEditUser',
        'save_user' => 'onSaveUser',
    ];

    public function render()
    {

        return view('livewire.personal.user');
    }
}
