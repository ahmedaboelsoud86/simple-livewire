<?php

namespace App\Livewire\Admin\Products;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Category;
use App\Models\Product;
use Livewire\Attributes\Validate;

class CreateProductsForm extends Component
{
    use WithFileUploads;
    public $state = [];

    #[Validate('required|image|max:1024')] // 1MB Max
    public $photo;

    #[Validate('required')] // 1MB Max
    public  $category_id;
    #[Validate('required')] // 1MB Max
    public  $name;
    #[Validate('required')] // 1MB Max
    public  $price;


    public function createProduct()
    {
        $this->validate();
        $product = new Product();
        $product->category_id = $this->category_id;
        $product->name = $this->name;
        $product->price = $this->price;
        if ($this->photo) {
            $product->photo = $this->photo->store('/', 'photos');
        }
        $product->save();
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
