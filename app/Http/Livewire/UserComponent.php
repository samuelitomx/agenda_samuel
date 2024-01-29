<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserComponent extends Component
{

    public $users;
    public $user;
    public $roles, $selectedRoles;

    public function render()
    {

        $this->users = User::query();
        $this->users = $this->users->where('tenant_id','like','%'.Auth::user()->tenant_id.'%');
        $this->users = $this->users->get();

        $this->quantity = User::getQuantity();

        $this->roles = Role::all();

        return view('livewire.user-component')->layout('components.layout-BaseElements');

    }

    public function store($user, $selectedRolesToAssign)
    {

        $this->user = new User();
        $this->user->name = $user['name'];
        $this->user->email = $user['email'];
        $this->user->password = Hash::make($user['password']);
        $this->user->phone_number = $user['phone_number'];
        $this->user->tenant_id = Auth::user()->tenant_id;
        $this->user->syncRoles($selectedRolesToAssign);
        $this->user->save();

    }
    
    public function update($setUser, $selectedRolesToUpdate)
    {
        
        $this->user = User::find($setUser['id']);
        $this->user->name = $setUser['name'];
        $this->user->email = $setUser['email'];
        $this->user->password = Hash::make($setUser['password']);
        $this->user->phone_number = $setUser['phone_number'];
        $this->user->syncRoles($selectedRolesToUpdate);
        $this->user->update();

    }



    public function destroy($deleteUser)
    {

        User::find($deleteUser['id'])->delete();

    }
    
}
