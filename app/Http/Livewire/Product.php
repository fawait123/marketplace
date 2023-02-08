<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product as ProductModel;
use Livewire\WithPagination;

class Product extends Component
{
    use WithPagination;

    public $search = '';
    public $page = 1;
    protected $queryString = ['search','page'];

    protected $paginationTheme = 'bootstrap';



    public function render()
    {
        $query = ProductModel::query();
        $query = $query->where('name','like','%'.$this->search.'%');
        $query = $query->paginate(12);
        return view('livewire.product',compact('query'));
    }

    public function paginationView()

    {
        return 'vendor.livewire.bootstrap';
    }
}
