<?php

namespace App\Http\Livewire\Product;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{

    public function render()
    {
        return view('livewire.product.index');
    }
}
