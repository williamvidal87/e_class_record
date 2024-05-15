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
use App\Models\User;
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
                $StudentName=User::where('id',$notify_data['student_id'])->first();
                $firts_name = explode(',', $StudentName->name);
                // Convert the entire string to lowercase
                $lastnameLower = strtolower($firts_name[0]);
                // Capitalize the first letter
                $lastnameProper = ucfirst($lastnameLower);
                $message = "Hello ".$lastnameProper.",
                
This is ".$this->InstructorName." from ".$this->Subject_Description.". I wanted to inform you that you have a missing ";
                //start if for midterm message or finalterm message
                $check_has_mid=0;
                $checkMidRecord=StudentMidTermActivityRecord::where('student_id',$notify_data['student_id'])->get();
                $checkMidterActivity=ActivityCategory::where('my_class_id',$this->MyClassID)->get();
                foreach ($checkMidterActivity as $checkmidteractivity) {
                    $count_missing = 0;
                    foreach ($checkMidRecord as $MidRecord) {
                        if ($MidRecord->getMidTermActivity->getMidTermCategory->id==$checkmidteractivity->id) {
                            if ($MidRecord->score==null) {
                                $check_has_mid++;
                            }
                        }
                    }
                }
                //end check if for midterm message or finalterm message

                //start if for midterm message or finalterm message
                $check_has_final=0;
                $checkFinalRecord=StudentFinalTermActivityRecord::where('student_id',$notify_data['student_id'])->get();
                $checkFinalterActivity=FinalActivityCategory::where('my_class_id',$this->MyClassID)->get();
                foreach ($checkFinalterActivity as $checkmidteractivity) {
                    foreach ($checkFinalRecord as $FinalRecord) {
                        if ($FinalRecord->getFinalTermActivity->getFinalTermCategory->id==$checkmidteractivity->id) {
                            if ($FinalRecord->score==null) {
                                $check_has_final++;
                            }
                        }
                    }
                }
                //end check if for midterm message or finalterm message

                
                if($check_has_mid!=0){
                    $checkMidRecord=StudentMidTermActivityRecord::where('student_id',$notify_data['student_id'])->get();
                    $checkMidterActivity=ActivityCategory::where('my_class_id',$this->MyClassID)->get();
                    foreach ($checkMidterActivity as $checkmidteractivity) {
                        $count_missing = 0;
                        foreach ($checkMidRecord as $MidRecord) {
                            if ($MidRecord->getMidTermActivity->getMidTermCategory->id==$checkmidteractivity->id) {
                                if ($MidRecord->score==null) {
                                    $count_missing++;
                                }
                            }
                        }
                        if($count_missing!=0) {
                            $message.="(".$count_missing.") ".$checkmidteractivity->activity_category.", ";
                        }
                    }
                    $message=substr($message, 0, -2);
                    $message.=" in Midterm";
                }
                
                if($check_has_final!=0&&$check_has_mid!=0) {
                    $message.=" and ";
                }

                if($check_has_final!=0){
                    $checkFinalRecord=StudentFinalTermActivityRecord::where('student_id',$notify_data['student_id'])->get();
                    $checkFinalterActivity=FinalActivityCategory::where('my_class_id',$this->MyClassID)->get();
                    foreach ($checkFinalterActivity as $checkmidteractivity) {
                        $count_missing = 0;
                        foreach ($checkFinalRecord as $FinalRecord) {
                            if ($FinalRecord->getFinalTermActivity->getFinalTermCategory->id==$checkmidteractivity->id) {
                                if ($FinalRecord->score==null) {
                                    $count_missing++;
                                }
                            }
                        }
                        if($count_missing!=0) {
                            $message.="(".$count_missing.") ".$checkmidteractivity->activity_category.", ";
                        }
                    }
                    $message=substr($message, 0, -2);
                    $message.=" in Finalterm";
                }
                $message.=". For more details, please check your e-class account. It's important to address these promptly to stay on track with your studies. If you need any assistance or clarification, feel free to reach out to me.

Best regards,
".$this->InstructorName;

                if($check_has_final!=0||$check_has_mid!=0){
                    $configuration = new Configuration(
                        host: 'https://89ljgr.api.infobip.com',
                        apiKey: '1079dd4ca6061011c676b31082f71093-5dc7cff6-784a-4f7d-be9e-02c73760068e'
                    );
                    $sendSmsApi = new SmsApi(config: $configuration);
                    $message = new SmsTextualMessage(
                        destinations: [
                            new SmsDestination(to: '63'.$StudentName->phone_number)
                        ],
                        from: 'E-class',
                        text: $message
                    );
                    $request = new SmsAdvancedTextualRequest(messages: [$message]);
                    try {
                        $smsResponse = $sendSmsApi->sendSmsMessage($request);
                    } catch (ApiException $apiException) {
                        // dd($apiException);
                    }
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
