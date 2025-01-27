<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\Category;
use App\Models\Order;

class Admin extends Component
{
    public $products;
    public $subCategories;
    public $categories;
    public $activeOrders;
    public $historyOrders;
    public $toatlHistoryOrders;
    public $toatalActiveOrders;
    public $totalProducts;
    public $totalCategories;


    public function mount()
    {
        $this->products = Product::with('category','subCategory')->get();
        $this->subCategories = SubCategory::all();
        $this->categories = Category::all();
        $this->activeOrders = Order::with('user','orderLine','orderLine.product')->where('status', 'pending')->get();
        $this->historyOrders = Order::with('user','orderLine','orderLine.product')->where('status', 'completed')->get();
        $this->toatlHistoryOrders = Order::where('status', 'completed')->count();
        $this->toatalActiveOrders = Order::where('status', 'pending')->count();
        $this->totalProducts = Product::count();
        $this->totalCategories = Category::count();
    
    }
  
    public function render()
    {
        return view('livewire.admin')->layout('layouts.admin');
    }
    
}
