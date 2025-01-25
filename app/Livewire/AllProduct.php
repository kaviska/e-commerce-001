<?php

namespace App\Livewire;

use Livewire\Component;

class AllProduct extends Component
{
    public $products;

    public function mount($id)
    {
        $this->products = \App\Models\Product::where('sub_category_id', $id)->get();
    }
    public function render()
    {
        return view('livewire.all-product');
    }
}
