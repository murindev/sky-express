<?php

namespace App\Traits\Liveware;

use App\Models\User;

trait UserLive
{

    public $edit_mode;

    public $user;

    public $userFields = [
        'email',
        'organization',
        'fio',
        'phone',
        'address',
        'address_legal',
        'id'
    ];

    public function getUser() {
        $this->user = User::whereId(auth()->user()->id)->select($this->userFields)->first()->toArray();
    }



    public function onEditUser()
    {
        $this->edit_mode = true;

    }

    public function onSaveUser() {
        User::whereId($this->user['id'])->update($this->user);
        $this->edit_mode = false;
        redirect()->route('user');
    }

    public function mount() {
        if(request('edit_user')){
            $this->edit_mode = (bool)request('edit_user');
        }

        $this->getUser();
    }
}
