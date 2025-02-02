<?php

namespace App\Livewire\Admin\Products;

use Livewire\WithPagination;
use Livewire\Component;
use App\Models\Product;
use App\Models\Category;

class ListProducts extends Component
{
    use WithPagination;

    public $seaechItem = null;
    public $checkProduct = [];
    public $selectAll = false;

    public $limteItem = 15;

    public $categories = null;

    protected $listeners = ["deletedCheckedItems"];

    public function updatedSelectAll($value){
        if($value){
            $this->checkProduct = Product::pluck('id');
        }else{
            $this->checkProduct = [];
        }
    }
    public function deletedCheckedItems()
    {
        Product::whereKey($this->checkProduct)->delete();
        $this->checkProduct = [];
        $this->selectAll = false;
        $this->dispatch('hide-delete-modal', ['message' => 'Products deleted successfully!']);
    }
    public function deleteProducts()
    {
        $this->dispatch('confirm-alert-delete', [
            'title' => "Are you sure ?",
            'html'  => "You won't be able to revert this! Productes ",
            'productIDS' => $this->checkProduct
        ]);
    }
    public function render()
    {
        $categories = Category::pluck('name', 'id');
        $products = Product::when($this->seaechItem,function($q){
            return $q->where('name','like','%'.$this->seaechItem.'%');
        })
        ->when($this->categories,function($q){
            return $q->where('category_id',$this->categories);
        })->latest()->paginate($this->limteItem);
        return view('livewire.admin.products.list-products',[
            'products' => $products,
            'cats' => $categories
        ]);
    }
}

