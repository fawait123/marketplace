<?php

namespace App\Http\Livewire\LandingPage;

use App\Models\product;
use Livewire\Component;

class NewArrival extends Component
{
    public function render()
    {
        $data = product::with('Category')->latest('id')->limit(10)->get();
        return view('livewire.landing-page.new-arrival', compact('data'));
    }
}
