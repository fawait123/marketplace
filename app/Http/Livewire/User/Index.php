<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Livewire\Component;

class Index extends Component
{
    public $search = '';
    public $limit = 10;

    protected $queryString = ['search','limit'];

    public function render()
    {

        $query = User::query();
        $query = $query->where('name', 'like', '%' . $this->search . '%');
        $query = $query->paginate($this->limit);
        return view('livewire.user.index', compact('query'));
    }
}
