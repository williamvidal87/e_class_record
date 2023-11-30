<?php

namespace App\Livewire\InstructorPanel\MyClass;

use App\Models\ClassStudent;
use App\Models\MidTermActivity;
use App\Models\StudentMidTermActivityRecord;
use Livewire\Component;

class ViewMidTermActivityRecordForm extends Component
{
    public  $MyClassID;
    public  $activity_name;
    public  $ActivityID;
    protected $listeners = [
        'ViewMidtermActivity',
    ];

    public function ViewMidtermActivity($ActivityID,$MyClassID)
    {
        $this->ActivityID=$ActivityID;
        $this->MyClassID=$MyClassID;
        $data=MidTermActivity::where('id',$ActivityID)->first();
        $this->activity_name=$data->activity_name;
        $ClassStudentData=ClassStudent::where('my_class_id',$MyClassID)->get();
        foreach ($ClassStudentData as $data2) {
            $CheckStudentExist=StudentMidTermActivityRecord::where('mid_term_activity_id',$this->ActivityID)->where('student_id',$data2->student_id)->get();
            if (count($CheckStudentExist)==0) {
                $data3 = ([
                    'mid_term_activity_id'  => $this->ActivityID,
                    'student_id'            => $data2->student_id,
                ]);
                StudentMidTermActivityRecord::create($data3);
            }
        }
        
    }

    public function render()
    {
        return view('livewire.instructor-panel.my-class.view-mid-term-activity-record-form',[
            'MidTermActivityData'   =>  StudentMidTermActivityRecord::where('mid_term_activity_id',$this->ActivityID)->get()
        ])->with('getUser');
    }

    public function CloseViewMidtermActivityRecordForm()
    {
        $this->dispatch('CloseViewMidtermActivityRecordModal');
        $this->dispatch('refresh_class_work_mid_term_table');
        $this->resetValidation();
        $this->reset();
    }
}
