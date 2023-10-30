<?php

namespace App\Livewire\AdminPanel\ManageUser;

use App\Models\User;
use Livewire\Component;

class StudentForm extends Component
{
    public  $id_number,
            $name,
            $email,
            $password,
            $confirm_password;
    public  $UserID;
    public  $rule_id = 3;
    
    protected $listeners = [
        'CloseStudentForm',
        'UserID'
    ];
    
    public function UserID($UserID){
        $this->UserID = $UserID;
        $data=User::find($UserID);
        $this->id_number = $data['id_number'];
        $this->name = $data['name'];
        $this->email = $data['email'];
    }
    
    public function render()
    {
        return view('livewire.admin-panel.manage-user.student-form');
    }
    
    public function Store()
    {
        $this->validate([
            'id_number'             => 'required||min:7||unique:users,id_number,'.$this->UserID,
            'name'                  => 'required',
            'email'                 => 'required|email|unique:users,email,'.$this->UserID,
            'password'              => 'required_without:UserID',
            'confirm_password'      => 'required_without:UserID|same:password',
        ]);
        
        $this->dispatch('CloseStudentModal');
        
        $data = ([
            'id_number'             => $this->id_number,
            'name'                  => $this->name,
            'email'                 => $this->email,
            'rule_id'               => $this->rule_id
        ]);
        try {
            if($this->UserID){
                if ($this->password) {
                    $data['password']=bcrypt($this->password);
                }
                User::find($this->UserID)->update($data);
                $this->dispatch('alert_update');
            }else{
                $data['password']=bcrypt($this->password);
                User::create($data);
                $this->dispatch('alert_store');
                
            }
            
        } catch (\Exception $e) {
			dd($e);
			return back();
        }
        
        $this->dispatch('CloseStudentForm');
    
    }
    
    public function CloseStudentForm()
    {   
        $this->dispatch('CloseStudentModal');
        $this->dispatch('refresh_student_table');
        $this->resetValidation();
        $this->reset();
        
    }
}
