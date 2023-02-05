<?php

namespace App\Http\Livewire\LandingPage;

use App\Models\Category;
use Livewire\Component;

class ListProduct extends Component
{
    public function render()
    {
        $data = Category::with('products')->get();
        return view('livewire.landing-page.list-product', compact('data'));
    }
}
