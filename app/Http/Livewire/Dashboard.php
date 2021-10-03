<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;

class Dashboard extends Component
{
    public function render()
    {
        $users = User::orderBy('created_at','desc')->get();
        $userscount = $users->count();

        return view('livewire.dashboard')->with(compact('users', 'userscount'));
    }
}
