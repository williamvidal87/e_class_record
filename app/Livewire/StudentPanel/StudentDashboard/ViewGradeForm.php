<?php

namespace App\Livewire\StudentPanel\StudentDashboard;

use App\Models\ActivityCategory;
use App\Models\FinalActivityCategory;
use App\Models\FinalTermActivity;
use App\Models\MidTermActivity;
use App\Models\MyClass;
use App\Models\StudentFinalTermActivityRecord;
use App\Models\StudentMidTermActivityRecord;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ViewGradeForm extends Component
{
    public  $MyClassID;
    public  $ClassDescription;
    public  $finalterm_grade=0;

    protected $listeners = [
        'ViewGradeID'
    ];

    public function ViewGradeID($MyClassID)
    {
        $this->MyClassID=$MyClassID;
        $MyClassData = MyClass::where('id',$this->MyClassID)->first();
        $this->ClassDescription = $MyClassData->getSubject->subject." ".$MyClassData->getSubject->description." - ".$MyClassData->section." (".$MyClassData->schedule." ".$MyClassData->time.")";
    }

    public function render()
    {
        return view('livewire.student-panel.student-dashboard.view-grade-form',[
            'ActivityCategoryData' =>   ActivityCategory::where('my_class_id',$this->MyClassID)->get(),
            'MidTermActivityData' =>   MidTermActivity::all(),
            'StudentMidTermActivityRecordData' =>   StudentMidTermActivityRecord::where('student_id',Auth::user()->id)->get(),
            'FinalActivityCategoryData' =>   FinalActivityCategory::where('my_class_id',$this->MyClassID)->get(),
            'FinalTermActivityData' =>   FinalTermActivity::all(),
            'StudentFinalTermActivityRecordData' =>   StudentFinalTermActivityRecord::where('student_id',Auth::user()->id)->get(),
        ]);
    }

    public function RefreshButton()
    {
        $this->dispatch('DispatchTable');
    }

    public function CloseViewGradesForm(){
        $this->dispatch('CloseViewGradeModal');
        $this->dispatch('refresh_student_dashboard');
        $this->resetValidation();
        $this->reset();
    }
}
