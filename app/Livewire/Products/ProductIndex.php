<?php

namespace App\Livewire\Products;

use App\Models\Product;
use Livewire\Component;

class ProductIndex extends Component
{
    public function render()
    {
        $products = Product::get();

        return view('livewire.products.product-index',compact('products'));
    }

    public function delete($id)
    {
        $products = Product::findOrFail($id);
        $products->delete();

        session()->flash('success', 'Product deleted successfully.');

        return redirect()->route('products.index');
    }
}
