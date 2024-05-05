<?php

namespace App\Livewire\AdminPanel\StudentClasses;

use App\Models\User;
use Livewire\Component;

class StudentClassesTable extends Component
{
    protected $listeners = [
        'refresh_instructorclasses_table' => '$refresh',
    ];
    
    public function render()
    {
        $this->dispatch('DispatchTable');
        return view('livewire.admin-panel.student-classes.student-classes-table',[
            'StudentClassesData' =>   User::where('rule_id',3)->get()
            ]);
    }
    
    public function ViewStudentClasses($StudentClassesID,$StudentName)
    {
        $this->dispatch('StudentClassesID',$StudentClassesID,$StudentName);
        $this->dispatch('OpenViewStudentClassesModal');
    }
}
