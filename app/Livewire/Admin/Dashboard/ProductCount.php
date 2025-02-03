<?php

namespace App\Livewire\Admin\Dashboard;

use Livewire\Component;
use App\Models\Product;

class ProductCount extends Component
{
    public $productsCount;

    public function mount()
    {
        $this->getProductsCount();
    }
    public function getProductsCount($yaer = null)
    {
        $this->productsCount = Product::query()
            ->when($yaer,function($q) use($yaer){
                return $q->whereYear('created_at',$yaer);
            })
            ->count();
    }

    public function render()
    {
        return view('livewire.admin.dashboard.product-count');
    }
}
