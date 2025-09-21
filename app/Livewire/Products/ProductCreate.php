<?php

namespace App\Livewire\Products;

use App\Models\Product;
use Livewire\Component;

class ProductCreate extends Component
{

    public $name,
           $details;

    public function render()
    {
        return view('livewire.products.product-create');
    }

    public function submit()
    {
        $this->validate([
            'name' => 'required',
            'details' => 'required',
        ]);

        Product::create([
            'name' => $this->name,
            'details' => $this->details,
        ]);
        

        return redirect()->route('products.index')->with('success', 'User created successfully.');
    }
}
