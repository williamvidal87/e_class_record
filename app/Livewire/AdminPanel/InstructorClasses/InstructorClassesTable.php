<?php

namespace App\Livewire\AdminPanel\InstructorClasses;

use App\Models\User;
use Livewire\Component;

class InstructorClassesTable extends Component
{
    protected $listeners = [
        'refresh_instructorclasses_table' => '$refresh',
    ];
    
    public function render()
    {
        $this->dispatch('DispatchTable');
        return view('livewire.admin-panel.instructor-classes.instructor-classes-table',[
            'InstructorClassesData' =>   User::where('rule_id',2)->get()
            ]);
    }
    
    public function ViewInstructorClasses($InstructorClassesID,$InstructorName)
    {
        $this->dispatch('InstructorClassesID',$InstructorClassesID,$InstructorName);
        $this->dispatch('OpenViewInstructorClassesModal');
    }
}
