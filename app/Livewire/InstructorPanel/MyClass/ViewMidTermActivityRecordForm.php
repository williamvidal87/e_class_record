<?php

namespace App\Livewire\InstructorPanel\MyClass;

use App\Models\ClassStudent;
use App\Models\MidTermActivity;
use App\Models\StudentMidTermActivityRecord;
use Livewire\Component;

class ViewMidTermActivityRecordForm extends Component
{
    public  $activity_name,
            $date,
            $maximum_score;
    public  $MyClassID;
    public  $ActivityID;
    public  $Scores = [];
    protected $listeners = [
        'ViewMidtermActivity',
        'CloseViewMidtermActivityRecordForm'
    ];

    public function ViewMidtermActivity($ActivityID,$MyClassID)
    {
        $this->ActivityID=$ActivityID;
        $this->MyClassID=$MyClassID;
        $data=MidTermActivity::where('id',$ActivityID)->first();
        $this->activity_name=$data->activity_name;
        $this->date=$data->date;
        $this->maximum_score=$data->maximum_score;
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
        $StudentMidTermActivityRecordData=StudentMidTermActivityRecord::where('mid_term_activity_id',$this->ActivityID)->get();
        foreach ($StudentMidTermActivityRecordData as $data2) {
            $CheckClassStudentExist=ClassStudent::where('my_class_id',$MyClassID)->where('student_id',$data2->student_id)->get();
            if (count($CheckClassStudentExist)==0) {
                StudentMidTermActivityRecord::destroy($data2->id);
            }
        }
        
        $CountAllData=StudentMidTermActivityRecord::where('mid_term_activity_id',$this->ActivityID)->get();
        foreach ($CountAllData as $index => $countalldata){
            $this->Scores[$index] = [
            'id' => $countalldata->id,
            'student_name'=>$countalldata->getUser->name,
            'score'=>$countalldata->score,
            ];
        }
    }

    public function render()
    {
        return view('livewire.instructor-panel.my-class.view-mid-term-activity-record-form',[
            'MidTermActivityData'   =>  StudentMidTermActivityRecord::where('mid_term_activity_id',$this->ActivityID)->get()
        ])->with('getUser');
    }
    
    public function Store()
    {
        $total_validation="nullable|lte:".$this->maximum_score;
        $this->validate([
            'Scores'            => 'array|required',
            'Scores.*.score'    => $total_validation,
        ]);
        $this->dispatch('CloseViewMidtermActivityRecordModal');
        
        try {
            foreach ($this->Scores as $index => $Scores) {
                    if($Scores['score']==""){
                        $Scores['score']=null;
                    }
                    $data = ([
                        'score'                         =>  $Scores['score'],
                    ]);
                    StudentMidTermActivityRecord::find($Scores['id'])->update($data);
            }
                $this->dispatch('alert_store');
            
        } catch (\Exception $e) {
			dd($e);
			return back();
        }
        
        $this->dispatch('CloseViewMidtermActivityRecordForm');
    
    }

    public function CloseViewMidtermActivityRecordForm()
    {
        $this->dispatch('CloseViewMidtermActivityRecordModal');
        $this->dispatch('refresh_class_work_mid_term_table');
        $this->resetValidation();
        $this->reset();
    }
}
