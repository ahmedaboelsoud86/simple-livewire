<?php

namespace App\Livewire\Admin\Products;

use Livewire\WithPagination;
use Livewire\Component;
use App\Models\Product;

class ListProducts extends Component
{
    use WithPagination;
    public function render()
    {
        $products = Product::latest()->paginate(2); 
        return view('livewire.admin.products.list-products',[
            'products' => $products
        ]);
    }
}
