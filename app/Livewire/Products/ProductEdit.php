<?php

namespace App\Livewire\Products;

use Livewire\Component;
use App\Models\Product;

class ProductEdit extends Component
{

    public $product,$name, $details;

    public function mount($id)
    {
        $this->product = Product::find($id);
        $this->name = $this->product->name;
        $this->details = $this->product->details;


    }
    public function render()
    {
        return view('livewire.products.product-edit');
    }

    public function submit()
    {
        $this->validate([
            'name' => 'required',
            'details' => 'required'
            
        ]);

        $this->product->name = $this->name;
        $this->product->details = $this->details;

        $this->product->save();

        session()->flash('success', 'Product updated successfully.');

        return redirect()->route('products.index');
    }
}
