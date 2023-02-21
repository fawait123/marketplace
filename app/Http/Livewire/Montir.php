<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Montir as ModelMontir;

class Montir extends Component
{
    public $search = '';
    public $limit = 10;

    protected $queryString= ['search','limit'];


    public function render()
    {
        $query = ModelMontir::query();
        $query = $query->where('name','like','%'.$this->search.'%');
        $query = $query->paginate($this->limit);
        return view('livewire.montir',compact('query'));
    }
}
