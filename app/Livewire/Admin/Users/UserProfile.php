<?php

namespace App\Livewire\Admin\Users;

use Livewire\Component;
use Livewire\WithFileUploads;

class UserProfile extends Component
{
    use WithFileUploads;

    public $image;

    public function updatedImage()  {

        $path  = $this->image->store('/','photos');
        auth()->user()->update([
            'photo' => $path
        ]);
        $this->dispatch('success', ['message' => 'Profile image updated successfully!']);
    }
    public function render()
    {
        return view('livewire.admin.users.user-profile');
    }
}
