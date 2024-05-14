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
use Infobip\Api\SmsApi;
use Infobip\Configuration;
use Infobip\ApiException;
use Infobip\Model\SmsAdvancedTextualRequest;
use Infobip\Model\SmsDestination;
use Infobip\Model\SmsTextualMessage;

class ViewClassRecordForm extends Component
{
    public  $semester_id,
            $school_year,
            $subject_id,
            $section,
            $schedule,
            $time,
            $SubjectTitle,
            $SemesterDescription,
            $InstructorName,
            $Units,
            $Subject_Code,
            $Subject_Description;
    public  $MyClassID;
    public  $checkall;
    public  $Notify = [];

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
        $this->time = $data->time;
        $this->SemesterDescription=$data->getSemester->description;
        $this->InstructorName=$data->getUser->name;
        $this->Units=$data->getSubject->unit;
        $this->Subject_Code=$data->getSubject->subject;
        $this->Subject_Description=$data->getSubject->description;
        $this->SubjectTitle=$data->getSubject->subject." ".$data->getSubject->description." - ".$this->section." (".$this->schedule." ".$this->time.")";
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
            'StudentFinalTermActivityRecordData' =>   StudentFinalTermActivityRecord::all()
            ])->with('getStudent');
    }

    public function SendNotification()
    {
        $checkMidCategory=ActivityCategory::where('my_class_id',$this->MyClassID)->get();
        $checkMidActivity=MidTermActivity::all();
        foreach ($this->Notify as $index => $notify_data) {
            if ($notify_data['checkbox']==true) {
                $checkMidRecord=StudentMidTermActivityRecord::where('student_id',$notify_data['student_id'])->get();
                foreach ($checkMidRecord as $MidRecord) {
                        dd($MidRecord);
                    }
            }

        }
    }

    public function ExportGrade()
    {
        $pdfContent = PDF::loadView('livewire.instructor-panel.class-record.export-class-record',[
            'ClassStudentData' =>   ClassStudent::join('users', 'class_students.student_id', '=', 'users.id')->where('my_class_id',$this->MyClassID)->orderBy('users.name', 'asc')->get(),
            'ActivityCategoryData' =>   ActivityCategory::where('my_class_id',$this->MyClassID)->get(),
            'MidTermActivityData' =>   MidTermActivity::all(),
            'StudentMidTermActivityRecordData' =>   StudentMidTermActivityRecord::all(),

            'FinalActivityCategoryData' =>   FinalActivityCategory::where('my_class_id',$this->MyClassID)->get(),
            'FinalTermActivityData' =>   FinalTermActivity::all(),
            'StudentFinalTermActivityRecordData' =>   StudentFinalTermActivityRecord::all(),
            'SemesterDescription'  => $this->SemesterDescription,
            'school_year'   =>  $this->school_year,
            'InstructorName'    =>  $this->InstructorName,
            'Units' =>  $this->Units,
            'schedule'  =>  $this->schedule,
            'time'  =>  $this->time,
            'Subject_Code'  =>  $this->Subject_Code,
            'Subject_Description'   =>  $this->Subject_Description,
            'section'   =>  $this->section
            ])->setPaper('Legal', 'Portrait')->output();
        return response()->streamDownload(fn () => print($pdfContent),$this->Subject_Code." ".$this->section.".pdf");
    }

    public function CloseViewClassRecordForm()
    {
        $this->dispatch('CloseViewClassRecordModal');
        $this->dispatch('refresh_my_class_table');
        $this->resetValidation();
        $this->reset();
    }
}
