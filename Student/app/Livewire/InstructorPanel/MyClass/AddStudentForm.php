<?php

namespace App\Livewire\InstructorPanel\MyClass;

use App\Models\ClassStudent;
use App\Models\User;
use Livewire\Component;

class AddStudentForm extends Component
{
    public  $my_class_id,
            $student_id;
    
    protected $listeners = [
        'Selected_student',
        'AddMyClassID',
        'CloseAddStudentForm'
    ];
    
    public function Selected_student($student_id)
    {
        $this->student_id=$student_id;
        if ($this->student_id==0) {
            $this->student_id=null;
        }
    }
    
    public function AddMyClassID($my_class_id)
    {
        $this->my_class_id=$my_class_id;
    }
    
    public function render()
    {
        return view('livewire.instructor-panel.my-class.add-student-form',[
            'StudentData' =>   User::where('rule_id',3)->get()
            ]);
    }
    
    public function Store()
    {
        $this->validate([
            'student_id'        => 'required',
        ]);
        $ClassStudentData=ClassStudent::where('my_class_id',$this->my_class_id)->where('student_id',$this->student_id)->first();
        if ($ClassStudentData) {
            $this->validate([
                'student_id'        => 'required||unique:class_students,student_id,'.$this->student_id,
            ]);
        }
        $this->dispatch('CloseAddStudentModal');
        
        $data = ([
            'my_class_id'       => $this->my_class_id,
            'student_id'        => $this->student_id,
        ]);
        
        try {
            ClassStudent::create($data);
            $this->dispatch('alert_store');
        
        } catch (\Exception $e) {
			dd($e);
			return back();
        }
        
        $this->dispatch('CloseAddStudentForm');
    
    }
    
    public function CloseAddStudentForm()
    {
        $this->dispatch('CloseAddStudentModal');
        $this->dispatch('refresh_view_my_class_table');
        $this->resetValidation();
        $this->reset();
    }
}
