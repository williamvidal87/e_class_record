<?php

namespace App\Livewire\Profile;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditProfile extends Component
{
    use WithFileUploads;
    
    public  $id_number,
            $name,
            $email,
            $phone_number;
    public  $photo;
    
    public function mount()
    {
        $data=User::find(Auth::user()->id);
        $this->id_number = $data['id_number'];
        $this->name = $data['name'];
        $this->email = $data['email'];
        $this->phone_number = $data['phone_number'];
    }
    
    public function render()
    {
        return view('livewire.profile.edit-profile');
    }
    
    public function Store()
    {
        $this->validate([
            'photo'                 => 'image|max:1024', // 1MB Max
            'id_number'             => 'required||min:7||unique:users,id_number,'.Auth::user()->id,
            'name'                  => 'required',
            'email'                 => 'required|email|unique:users,email,'.Auth::user()->id,
            'phone_number'          => 'required|digits:10|numeric',
        ]);
        
        $data = ([
            'id_number'             => $this->id_number,
            'name'                  => $this->name,
            'email'                 => $this->email,
            'phone_number'          => $this->phone_number
        ]);
        try {
            if ($this->photo) {
                $data['profile_photo_path']=$this->photo->store('profile-photos');
            }
            User::find(Auth::user()->id)->update($data);
            $this->dispatch('alert_update');
            return redirect()->to('/dashboard');
            
        } catch (\Exception $e) {
			dd($e);
			return back();
        }
    
    }
}
