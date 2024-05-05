<?php

namespace App\Livewire\AdminPanel\InstructorClasses;

use App\Models\MyClass;
use Livewire\Component;

class ViewInstructorClassesForm extends Component
{
    public  $InstructorClassesID,
            $InstructorName;

    protected $listeners = [
        'InstructorClassesID',
        'refresh_my_class_table' => '$refresh',
    ];

    public function InstructorClassesID($InstructorClassesID,$InstructorName)
    {
        $this->InstructorClassesID=$InstructorClassesID;
        $this->InstructorName=$InstructorName;
    }

    public function render()
    {
        $this->dispatch('DispatchTable');
        return view('livewire.admin-panel.instructor-classes.view-instructor-classes-form',[
            'MyClassData' =>   MyClass::where('instructor_id',$this->InstructorClassesID)->get()
            ])->with('getSemester','getInstructorClasses');
    }

    public function ViewClassRecord($MyClassID)
    {
        $this->dispatch('ViewClassRecordID',$MyClassID);
        $this->dispatch('OpenViewClassRecordModal');
    }
    
    public function CloseViewInstructorClassesForm()
    {   
        $this->dispatch('CloseViewInstructorClassesModal');
        $this->dispatch('refresh_instructorclasses_table');
        $this->resetValidation();
        $this->reset();
        
    }
}
