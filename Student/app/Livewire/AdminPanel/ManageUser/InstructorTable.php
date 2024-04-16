<?php

namespace App\Livewire\AdminPanel\ManageUser;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class InstructorTable extends Component
{
    protected $listeners = [
        'refresh_instructor_table' => '$refresh',
        'EditInstructor',
        'Deleted'
    ];
    
    public function render()
    {
        $this->dispatch('DispatchTable');
        return view('livewire.admin-panel.manage-user.instructor-table',[
            'InstructorData' =>   User::all()->where('rule_id',2)->whereNotIn('id',Auth::user()->id)
            ]);
    }
    
    public function OpenInstructorForm()
    {
        $this->dispatch('OpenInstructorModal');
    }
    
    public function EditInstructor($UserID)
    {
        $this->dispatch('UserID',$UserID);
        $this->dispatch('OpenInstructorModal');
    }
    
    public function DeleteInstructor($UserID)
    {
        $this->dispatch('DeleteConfirm',$UserID);
    }
    
    public function Deleted($UserID)
    {
        User::destroy($UserID);
        $this->dispatch('alert_delete');
    }
}
