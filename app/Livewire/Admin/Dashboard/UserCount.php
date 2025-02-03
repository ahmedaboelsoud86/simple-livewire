<?php

namespace App\Livewire\Admin\Dashboard;

use Livewire\Component;
use App\Models\User;

class UserCount extends Component
{
    public $usersCount;

    public function mount()
    {
        $this->getUsersCount();
    }

    public function getUsersCount($yaer = null)
    {
        $this->usersCount = User::query()
            ->when($yaer,function($q) use($yaer){
                return $q->whereYear('created_at',$yaer);
            })
            ->count();
    }

    public function render()
    {
        return view('livewire.admin.dashboard.user-count');
    }
}
