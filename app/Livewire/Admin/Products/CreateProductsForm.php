<?php

namespace App\Livewire\Admin\Products;

use Livewire\Component;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;

class CreateProductsForm extends Component
{
    public $state = [];

    public function createProduct()
    {
        Validator::make(
            $this->state,
            [
                'category_id' => 'required',
                'name' => 'required',
                'price' => 'required',
            ],
            [
                'category_id.required' => 'The Category field is required.',
            ]
        )->validate();
        Product::create($this->state);
        $this->dispatch('success', ['message' => 'Product created successfully!']);

        return redirect()->route('products');
    }
    public function render()
    {
        $categories = Category::pluck('name', 'id');
        return view('livewire.admin.products.create-products-form', [
            'categories' => $categories
        ]);
    }
}
