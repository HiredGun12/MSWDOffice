<?php

namespace App\Livewire\Products;

use Livewire\Component;
use App\Models\Product;

class ProductShow extends Component
{

    public $products;

    public function mount($id)
    {
        $this->products= Product::findOrFail($id);
    }
    
    public function render()
    {
        return view('livewire.products.product-show');
    }

}
