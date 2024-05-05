<?php

namespace App\Livewire\StudentPanel\StudentDashboard;

use App\Models\ClassStudent;
use App\Models\MyClass;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class StudentDashboard extends Component
{
    public $DataArray=[];
    public $StudentID;
    public $CardColor = array("success","primary","warning","info","primary");
    public $listeners = ['refresh_student_dashboard'=>'$refresh'];

    public function render()
    {
        $this->StudentID=Auth::user()->id;
        $ClassStudentData = ClassStudent::where('student_id',Auth::user()->id)->get();
        foreach ($ClassStudentData as $index => $data) {
            $this->DataArray[$index]=$data->my_class_id;
        }
        $this->dispatch('DispatchTable');
        return view('livewire.student-panel.student-dashboard.student-dashboard',[
            'MyClassData' =>   MyClass::whereIn('id',$this->DataArray)->orderBy('id', 'desc')->get()
        ])->with('getSemester');
    }

    public function OpenJoinClassCodeForm()
    {
        $this->dispatch('OpenJoinClassCodeModal');
    }
    

    public function ViewGrades($GradeID)
    {
        $this->dispatch('ViewGradeID',$GradeID,$this->StudentID);
        $this->dispatch('OpenViewGradeModal');
    }
}
