<?php

namespace App\Livewire\Profile;

use App\Models\Course;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditProfile extends Component
{
    use WithFileUploads;
    
    public  $id_number,
            $course_id,
            $name,
            $email,
            $phone_number;
    public  $photo;
    
    protected $listeners = [
        'Selected_course'
    ];
    
    public function mount()
    {
        $data=User::find(Auth::user()->id);
        $this->id_number = $data['id_number'];
        $this->course_id = $data['course_id'];
        $this->name = $data['name'];
        $this->email = $data['email'];
        $this->phone_number = $data['phone_number'];
        $this->dispatch('Refresh_course_id',$this->course_id);
    }
    
    public function Selected_course($course_id)
    {
        $this->course_id=$course_id;
        if ($this->course_id==0) {
            $this->course_id=null;
        }
    }
    
    public function render()
    {
        return view('livewire.profile.edit-profile',[
            'CourseData' =>   Course::all()
            ]);
    }
    
    public function Store()
    {
        $this->validate([
            'id_number'             => 'required||min:7||unique:users,id_number,'.Auth::user()->id,
            'name'                  => 'required',
            'email'                 => 'required|email|unique:users,email,'.Auth::user()->id,
            'phone_number'          => 'required|digits:10|numeric',
        ]);
        if (Auth::user()->rule_id==3) {
            $this->validate([
                'course_id'             => 'required',
            ]);
        }
        $data = ([
            'id_number'             => $this->id_number,
            'course_id'             => $this->course_id,
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
