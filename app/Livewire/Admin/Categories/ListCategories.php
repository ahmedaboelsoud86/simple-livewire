<?php

namespace App\Livewire\Admin\Categories;

use Livewire\Component;
use Illuminate\Support\Facades\Validator;
use Livewire\WithPagination;
use App\Models\Category;

class ListCategories extends Component
{

    use WithPagination;
    public $state = [];
    public $category;
    public $showEditModal = false;
    public $categoryIdBeingRemoved = null;

    public function confirmCategoryRemoval($categoryId)
    {
        $this->categoryIdBeingRemoved = $categoryId;

        $this->dispatch('show-delete-modal');
    }
    public function deleteCategory()
    {
        $category = Category::findOrFail($this->categoryIdBeingRemoved);

        $category->delete();

        $this->dispatch('hide-delete-modal', ['message' => 'Category deleted successfully!']);
    }
    public function edit(Category $category)
    {
        $this->reset();

        $this->showEditModal = true;

        $this->category = $category;

        $this->state = $category->toArray();

        $this->dispatch('show-form');
    }
    public function updateCategory()
    {
        $validatedData = Validator::make($this->state, [
            'name' => 'required|unique:categories,name,'.$this->category->id,
        ])->validate();

        if (! empty($validatedData['password'])) {
            $validatedData['password'] = bcrypt($validatedData['password']);
        }

        $this->category->update($validatedData);

        $this->dispatch('hide-form', ['message' => 'Category updated successfully!']);
    }
    public function addNewCategory()
    {
        $this->reset();

        $this->showEditModal = false;

        $this->dispatch('show-form');
    }
    public function createCategory()
    {
        $validatedData = Validator::make($this->state, [
            'name' => 'required|unique:categories',
        ])->validate();
        Category::create($validatedData);
        $this->dispatch('hide-form', ['message' => 'Category added successfully!']);
    }
    public function render()
    {
        $categories = Category::latest()->paginate(2);
        return view('livewire.admin.categories.list-categories',[
            'categories' => $categories
        ]);
    }
}
