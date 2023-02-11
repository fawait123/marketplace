<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Transaction as ModelTransaction;

class Transaction extends Component
{
    public $search = '';
    public $limit = 10;

    protected $queryString = ['search','limit'];
    public function render()
    {
        $query = ModelTransaction::query();
        $query = $query->where('name','like','%'.$this->search.'%');
        $query = $query->paginate($this->limit);
        return view('livewire.transaction',compact('query'));
    }
}
