<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product as ProductModel;

class Product extends Component
{
    public $product;

    public function mount($id)
    {
        $this->product = ProductModel::findOrFail($id);
    }

    public function render()
    {
        return view('livewire.product', ['product' => $this->product]);
    }
}
