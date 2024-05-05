<?php

namespace App\Livewire\AdminPanel\StudentClasses;

use App\Models\ClassStudent;
use Livewire\Component;

class ViewStudentClassesForm extends Component
{
    public  $StudentClassesID,
            $StudentName;

    protected $listeners = [
        'StudentClassesID',
        'refresh_my_class_table' => '$refresh',
    ];

    public function StudentClassesID($StudentClassesID,$StudentName)
    {
        $this->StudentClassesID=$StudentClassesID;
        $this->StudentName=$StudentName;
    }

    public function render()
    {
        $this->dispatch('DispatchTable');
        return view('livewire.admin-panel.student-classes.view-student-classes-form',[
            'ClassStudentData' =>   ClassStudent::where('student_id',$this->StudentClassesID)->get()
            ]);
    }

    public function ViewClassRecord($ClassStudentID)
    {
        $this->dispatch('ViewClassRecordID',$ClassStudentID);
        $this->dispatch('OpenViewClassRecordModal');
    }
    
    public function CloseViewStudentClassesForm()
    {   
        $this->dispatch('CloseViewStudentClassesModal');
        $this->dispatch('refresh_instructorclasses_table');
        $this->resetValidation();
        $this->reset();
        
    }
}
