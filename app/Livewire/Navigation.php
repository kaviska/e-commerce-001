<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\SubCategory;

class Navigation extends Component
{
    public $c1;
    public $c2;
    public $c3;
    public $c4;
    public $c5;

  
    public function render()
    {
         //load SubCategory categories 1-5
        $this->c1 = SubCategory::where('category_id',1)->get();
        $this->c2 = SubCategory::where('category_id',2)->get();
        $this->c3 = SubCategory::where('category_id',3)->get();
        $this->c4 = SubCategory::where('category_id',4)->get();
        $this->c5 = SubCategory::where('category_id',5)->get();

        return view('livewire.navigation',[
           
        ]);
    }
}
