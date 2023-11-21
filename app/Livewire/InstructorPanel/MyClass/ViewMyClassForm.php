<?php

namespace App\Livewire\InstructorPanel\MyClass;

use App\Models\MyClass;
use App\Models\User;
use Livewire\Component;

class ViewMyClassForm extends Component
{
    public  $semester_id,
            $school_year,
            $subject_id,
            $section,
            $schedule;
    public  $MyClassID;
    public  $SubjectTitle;
    protected $listeners = [
        'ViewMyClassID',
    ];
    
    public function ViewMyClassID($MyClassID)
    {
        $this->MyClassID = $MyClassID;
        $data=MyClass::where('id',$MyClassID)->first();
        $this->semester_id = $data->semester_id;
        $this->school_year = $data->school_year;
        $this->subject_id = $data->subject_id;
        $this->section = $data->section;
        $this->schedule = $data->schedule;
        $this->SubjectTitle=$data->getSubject->subject." ".$data->getSubject->description." - ".$this->section." (".$this->schedule.")";
    }
    
    public function render()
    {
        $this->dispatch('DispatchTable');
        return view('livewire.instructor-panel.my-class.view-my-class-form',[
            'StudentData' =>   User::all()
            ]);
    }
    
    public function OpenAddStudentForm()
    {
        $this->dispatch('OpenAddStudentModal');
    }
    
    public function CloseMyClassForm()
    {   
        $this->dispatch('CloseViewMyClassModal');
        $this->dispatch('refresh_my_class_table');
        $this->resetValidation();
        $this->reset();
        
    }
}
