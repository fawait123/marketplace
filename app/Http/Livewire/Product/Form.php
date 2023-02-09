<?php

namespace App\Http\Livewire\Product;

use Livewire\Component;
use App\Models\Category;

class Form extends Component
{
    public $count = 2;

    protected $queryString = ['count'];


    public function render()
    {
        $category = Category::get();
        $count = $this->count;
        return view('livewire.product.form',compact('category','count'));
    }

    public function addForm()
    {
        $this->count++;
    }
}
