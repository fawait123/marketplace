<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category as ModelCategory;

class Category extends Component
{
    public $search = '';
    public $limit = 10;

    protected $queryString= ['search','limit'];

    public function render()
    {
        $query = ModelCategory::query();
        $query = $query->where('name','like','%'.$this->search.'%');
        $query = $query->paginate($this->limit);
        return view('livewire.category',compact('query'));
    }
}
