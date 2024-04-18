<?php

namespace App\Livewire\InstructorPanel\ClassRecord;

use App\Models\ActivityCategory;
use App\Models\ClassStudent;
use App\Models\FinalActivityCategory;
use App\Models\FinalTermActivity;
use App\Models\MidTermActivity;
use App\Models\MyClass;
use App\Models\StudentFinalTermActivityRecord;
use App\Models\StudentMidTermActivityRecord;
use Livewire\Component;
use Barryvdh\DomPDF\Facade\Pdf as PDF;


class ViewClassRecordForm extends Component
{
    public  $semester_id,
            $school_year,
            $subject_id,
            $section,
            $schedule,
            $SubjectTitle;
    public  $MyClassID;
    protected $listeners = [
        'ViewClassRecordID',
    ];
    
    public function ViewClassRecordID($MyClassID)
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
        return view('livewire.instructor-panel.class-record.view-class-record-form',[
            'ClassStudentData' =>   ClassStudent::join('users', 'class_students.student_id', '=', 'users.id')->where('my_class_id',$this->MyClassID)->orderBy('users.name', 'asc')->get(),
            'ActivityCategoryData' =>   ActivityCategory::where('my_class_id',$this->MyClassID)->get(),
            'MidTermActivityData' =>   MidTermActivity::all(),
            'StudentMidTermActivityRecordData' =>   StudentMidTermActivityRecord::all(),

            'FinalActivityCategoryData' =>   FinalActivityCategory::where('my_class_id',$this->MyClassID)->get(),
            'FinalTermActivityData' =>   FinalTermActivity::all(),
            'StudentFinalTermActivityRecordData' =>   StudentFinalTermActivityRecord::all(),
            ])->with('getStudent');
    }

    public function ExportGrade()
    {
        
        $pdfContent = PDF::loadView('livewire.instructor-panel.class-record.export-class-record',[
            ])->setPaper('Legal', 'Portrait')->output();
        return response()->streamDownload(fn () => print($pdfContent),"sample.pdf");
    }

    public function CloseViewClassRecordForm()
    {
        $this->dispatch('CloseViewClassRecordModal');
        $this->dispatch('refresh_my_class_table');
        $this->resetValidation();
        $this->reset();
    }
}
