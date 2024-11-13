<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use Session;

class UserListLivewire extends Component
{
    public function render()
    {
        return view('livewire.user-list-livewire',[
            'data' => User::where('designation', '!=', 'Administrator')
            ->distinct('name')
            ->get()
        ]);
    }
}
