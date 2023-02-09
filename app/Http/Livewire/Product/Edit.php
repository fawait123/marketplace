<?php

namespace App\Http\Livewire\Product;

use Livewire\Component;
use App\Models\Category;
use App\Models\Product;

class Edit extends Component
{
    public $count = 0;

    protected $queryString = ['count'];


    public function render()
    {
        $category = Category::get();
        $product = Product::with('detail')->where('id',request('id'))->first();
        $id = request('id');
        return view('livewire.product.edit',compact('id','product','category'));
    }

    public function addForm()
    {
        $this->count = $this->count + 1;
    }
}
