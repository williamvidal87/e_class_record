<?php

namespace App\Livewire\AdminPanel\ManageUser;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class StudentTable extends Component
{
    protected $listeners = [
        'refresh_student_table' => '$refresh',
        'EditStudent',
        'Deleted'
    ];
    
    public function render()
    {
        $this->dispatch('DispatchTable');
        return view('livewire.admin-panel.manage-user.student-table',[
            'StudentData' =>   User::all()->where('rule_id',3)->whereNotIn('id',Auth::user()->id)
            ]);
    }
    
    public function OpenStudentForm()
    {
        $this->dispatch('OpenStudentModal');
    }
    
    public function EditStudent($UserID)
    {
        $this->dispatch('UserID',$UserID);
        $this->dispatch('OpenStudentModal');
    }
    
    public function DeleteStudent($UserID)
    {
        $this->dispatch('DeleteConfirm',$UserID);
    }
    
    public function Deleted($UserID)
    {
        User::destroy($UserID);
        $this->dispatch('alert_delete');
    }
}
