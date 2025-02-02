<?php

namespace App\Livewire\Admin\Products;

use Livewire\Component;
use Illuminate\Support\Facades\Validator;
use App\Models\Category;
use Livewire\WithFileUploads;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;


class UpdateProductForm extends Component
{
    use WithFileUploads;
    public $state = [];

    public $photo;

    public $product;


    public function mount(Product $product)
    {
        $this->state = $product->toArray();

        $this->product = $product;
    }
    public function updateProduct()
    {
        $validatedData = Validator::make(
            $this->state,
            [
                'category_id' => 'required',
                'name' => 'required',
                'price' => 'required',
            ],
            [
                'category_id.required' => 'The Category Id field is required.',
            ]
        )->validate();

        if ($this->photo) {
            Storage::disk('photos')->delete($this->product->photo);
            $validatedData['photo'] = $this->photo->store('/', 'photos');
        }
        $this->product->update($validatedData);

        $this->dispatch('success', ['message' => 'Product updated successfully!']);
    }
    public function render()
    {
        $categories = Category::pluck('name', 'id');
        return view('livewire.admin.products.update-product-form', ['categories' => $categories]);
    }
}
