<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product as ProductModel;
use App\Models\Category as CategoryModel;
use Livewire\WithPagination;

class Product extends Component
{
    use WithPagination;

    public $search = '';
    public $page = 1;
    public $category = '';
    protected $queryString = ['search','page','category'];

    protected $paginationTheme = 'bootstrap';



    public function render()
    {
        $query = ProductModel::query();
        $query = $query->where('name','like','%'.$this->search.'%');
        if(isset($this->category) && $this->category != ''){
            $query = $query->where('category_id',$this->category);
        }
        $query = $query->paginate(12);
        $categories = CategoryModel::all();
        return view('livewire.product',compact('query','categories'));
    }

    public function paginationView()

    {
        return 'vendor.livewire.bootstrap';
    }
}
