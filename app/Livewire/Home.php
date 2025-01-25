<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product ;

class Home extends Component
{
    public $featuredProducts;
    public $bestSellingProducts;

    public function mount()
    {
        $this->featuredProducts = Product::where('is_featured', 1)->get();
        $this->bestSellingProducts = Product::orderBy('orders', 'desc')->get();
    }
    public function render()
    {
        return view('livewire.home');
    }
}
