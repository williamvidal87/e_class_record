<?php

namespace App\Livewire\InstructorPanel\MyClass;

use App\Models\MyClass;
use App\Models\Semester;
use App\Models\Subject;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class MyClassForm extends Component
{
    public  $semester_id,
            $school_year,
            $subject_id,
            $section,
            $schedule;
    public  $MyClassID;
    
    protected $listeners = [
        'CloseMyClassForm',
        'MyClassID',
        'Selected_semester',
        'Selected_subject'
    ];
    
    public function MyClassID($MyClassID){
        $this->MyClassID = $MyClassID;
        $data=MyClass::find($MyClassID);
        $this->semester_id = $data['semester_id'];
        $this->school_year = $data['school_year'];
        $this->subject_id = $data['subject_id'];
        $this->section = $data['section'];
        $this->schedule = $data['schedule'];
        $this->dispatch('Refresh_semester_id',$this->semester_id);
        $this->dispatch('Refresh_subject_id',$this->subject_id);
    }
    
    public function Selected_semester($semester_id)
    {
        $this->semester_id=$semester_id;
        if ($this->semester_id==0) {
            $this->semester_id=null;
        }
    }
    
    public function Selected_subject($subject_id)
    {
        $this->subject_id=$subject_id;
        if ($this->subject_id==0) {
            $this->subject_id=null;
        }
    }
    
    public function render()
    {
        return view('livewire.instructor-panel.my-class.my-class-form',[
            'SemesterData' =>   Semester::all(),
            'SubjectData' =>   Subject::all()
            ]);
    }
    
    public function Store()
    {
        $this->validate([
            'semester_id'       => 'required',
            'school_year'       => 'required',
            'subject_id'        => 'required',
            'section'           => 'required',
            'schedule'          => 'required',
        ]);
        
        $this->dispatch('CloseMyClassModal');
        
        $data = ([
            'semester_id'       => $this->semester_id,
            'school_year'       => $this->school_year,
            'subject_id'        => $this->subject_id,
            'section'           => $this->section,
            'schedule'          => $this->schedule,
            'instructor_id'     => Auth::user()->id,
        ]);
        try {
            if($this->MyClassID){
                MyClass::find($this->MyClassID)->update($data);
                $this->dispatch('alert_update');
            }else{
                MyClass::create($data);
                $this->dispatch('alert_store');
                
            }
            
        } catch (\Exception $e) {
			dd($e);
			return back();
        }
        
        $this->dispatch('CloseMyClassForm');
    
    }
    
    public function CloseMyClassForm()
    {   
        $this->dispatch('CloseMyClassModal');
        $this->dispatch('refresh_my_class_table');
        $this->resetValidation();
        $this->reset();
        
    }
}
