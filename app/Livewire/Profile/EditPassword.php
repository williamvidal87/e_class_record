<?php

namespace App\Livewire\Profile;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Fortify\Contracts\UpdatesUserPasswords;
use Livewire\Component;

class EditPassword extends Component
{
    public  $current,
            $new_password,
            $confirm_password;
    
    public function render()
    {
        return view('livewire.profile.edit-password');
    }
    
    public function Store()
    {
        dd(Hash::check($this->current, Auth::user()->password));
        $this->validate([
            'current'               => 'required|password',
            'new_password'          => 'required',
            'confirm_password'      => 'required|confirmed|unique:users',
        ]);
        $data = ([
            'new_password'          => $this->new_password,
        ]);
        try {
            User::find(Auth::user()->id)->update($data);
            $this->dispatch('alert_update');
            return redirect()->to('/dashboard');
            
        } catch (\Exception $e) {
			dd($e);
			return back();
        }
    
    }
}
