<?php

namespace App\Livewire\Admin\Users;

use Livewire\Component;
use Illuminate\Support\Facades\Validator;
use Livewire\WithPagination;
use App\Models\User;


class ListUsers extends Component
{
    use WithPagination;
    public $state = [];
    public $user;
    public $showEditModal = false;
    public $userIdBeingRemoved = null;

    //public $status;

    public function confirmUserRemoval($userId)
    {
        $this->userIdBeingRemoved = $userId;

        $this->dispatch('show-delete-modal');
    }

    public function cahngeStatus(User $user)
    {
       $user->status = $user->status ? "0" : "1";
       $user->save();
       $this->dispatch('success', ['message' => 'Status changed successfully!']);

    }
    public function deleteUser()
    {
        $user = User::findOrFail($this->userIdBeingRemoved);

        $user->delete();

        $this->dispatch('hide-delete-modal', ['message' => 'User deleted successfully!']);
    }
    public function edit(User $user)
    {
        $this->reset();

        $this->showEditModal = true;

        $this->user = $user;

        $this->state = $user->toArray();

        $this->dispatch('show-form');
    }
    public function updateUser()
    {
        $validatedData = Validator::make($this->state, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$this->user->id,
            'password' => 'sometimes|confirmed',
        ])->validate();

        if (! empty($validatedData['password'])) {
            $validatedData['password'] = bcrypt($validatedData['password']);
        }

        // if ($this->photo) {
        //     Storage::disk('avatars')->delete($this->user->avatar);
        //     $validatedData['avatar'] = $this->photo->store('/', 'avatars');
        // }

        $this->user->update($validatedData);

        $this->dispatch('hide-form', ['message' => 'User updated successfully!']);
    }
    public function addNewUser()
    {
        $this->reset();

        $this->showEditModal = false;

        $this->dispatch('show-form');
    }
    public function createUser()
    {
        $validatedData = Validator::make($this->state, [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
        ])->validate();

        $validatedData['password'] = bcrypt($validatedData['password']);

        // if ($this->photo) {
        //     $validatedData['avatar'] = $this->photo->store('/', 'avatars');
        // }

        User::create($validatedData);

        // session()->flash('message', 'User added successfully!');

        $this->dispatch('hide-form', ['message' => 'User added successfully!']);
    }
    public function render()
    {
        $users = User::latest()->paginate(2);
        return view('livewire.admin.users.list-users',[
            'users' => $users
        ]);
    }
}
