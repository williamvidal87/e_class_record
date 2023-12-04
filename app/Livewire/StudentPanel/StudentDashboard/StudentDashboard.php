<?php

namespace App\Livewire\StudentPanel\StudentDashboard;

use App\Models\ClassStudent;
use App\Models\MyClass;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class StudentDashboard extends Component
{
    public $DataArray=[];
    public $CardColor = array("success","primary","warning","info","primary");

    public function render()
    {
        $ClassStudentData = ClassStudent::where('student_id',Auth::user()->id)->get();
        foreach ($ClassStudentData as $index => $data) {
            $this->DataArray[$index]=$data->my_class_id;
        }
        return view('livewire.student-panel.student-dashboard.student-dashboard',[
            'MyClassData' =>   MyClass::whereIn('id',$this->DataArray)->get()
        ])->with('getSemester');
    }
}
