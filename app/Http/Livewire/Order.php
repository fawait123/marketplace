<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Order as ModelOrder;

class Order extends Component
{
    public $search = '';
    public $limit = 10;

    protected $queryString= ['search','limit'];

    public function render()
    {
        $query = ModelOrder::query();
        $query = $query->with('montir');
        $query = $query->where('name','like','%'.$this->search.'%');
        $query = $query->latest()->paginate($this->limit);
        return view('livewire.order',compact('query'));
    }
}
