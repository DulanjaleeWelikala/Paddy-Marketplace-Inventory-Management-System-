<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Paddy;

class TopStockVarieties extends Component
{
    public $topVarieties;

    public function mount()
    {
        // Fetch top 5 paddy varieties with highest stock
        $this->topVarieties = Paddy::orderByDesc('quantity')->take(5)->get();
    }

    public function render()
    {
        return view('livewire.top-stock-varieties');
    }
}

