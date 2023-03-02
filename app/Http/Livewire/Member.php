<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Member as ModelMember;

class Member extends Component
{

    public function render()
    {
        return view('livewire.member');
    }
}
