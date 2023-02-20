<?php

namespace App\Http\Livewire\Product;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    public $search = '';
    public $limit = 10;

    protected $paginationTheme = 'bootstrap';

    protected $queryString= ['search','limit'];

    public function render()
    {
        $query = Product::with('category');
        $query = $query->where('name','like','%'.$this->search.'%');
        $query = $query->paginate($this->limit);
        return view('livewire.product.index',compact('query'));
    }

    public function paginationView()

    {
        return 'vendor.livewire.simple-bootstrap';
    }
}
