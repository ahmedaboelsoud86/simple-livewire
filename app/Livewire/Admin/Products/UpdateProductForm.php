<?php

namespace App\Livewire\Admin\Products;

use Livewire\Component;
use Illuminate\Support\Facades\Validator;
use App\Models\Category;
use App\Models\Product;


class UpdateProductForm extends Component
{
    public $state = [];

    public $product;
    public function mount(Product $product)
    {
        $this->state = $product->toArray();

        $this->product = $product;
    }
    public function updateProduct()
    {
        Validator::make(
            $this->state,
            [
                'category_id' => 'required',
                'name' => 'required',
                'price' => 'required',
            ],
            [
                'category_id.required' => 'The Category Id field is required.',
            ])->validate();

        $this->product->update($this->state);

        $this->dispatch('success', ['message' => 'Product updated successfully!']);
    }
    public function render()
    {
        $categories = Category::pluck('name','id');
        return view('livewire.admin.products.update-product-form',['categories'=>$categories]);
    }
}
