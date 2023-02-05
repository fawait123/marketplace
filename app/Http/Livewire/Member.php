<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Member as ModelMember;

class Member extends Component
{
    public $search = '';
    public $limit = 10;

    protected $queryString= ['search','limit'];
    public function render()
    {
        $query = ModelMember::query();
        $query = $query->where('name','like','%'.$this->search.'%');
        $query = $query->paginate($this->limit);
        return view('livewire.member',compact('query'));
    }
}
