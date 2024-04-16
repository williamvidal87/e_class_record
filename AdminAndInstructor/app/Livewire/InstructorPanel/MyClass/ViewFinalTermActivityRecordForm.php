<?php

namespace App\Livewire\InstructorPanel\MyClass;

use App\Models\ClassStudent;
use App\Models\FinalTermActivity;
use App\Models\StudentFinalTermActivityRecord;
use Livewire\Component;

class ViewFinalTermActivityRecordForm extends Component
{
    public  $activity_name,
            $date,
            $maximum_score;
    public  $MyClassID;
    public  $ActivityID;
    public  $Scores = [];
    protected $listeners = [
        'refresh_view_final_term_table' => '$refresh',
        'ViewFinaltermActivity',
        'CloseViewFinaltermActivityRecordForm'
    ];

    public function ViewFinaltermActivity($ActivityID,$MyClassID)
    {
        $this->ActivityID=$ActivityID;
        $this->MyClassID=$MyClassID;
        $data=FinalTermActivity::where('id',$ActivityID)->first();
        $this->activity_name=$data->activity_name;
        $this->date=$data->date;
        $this->maximum_score=$data->maximum_score;
        $ClassStudentData=ClassStudent::where('my_class_id',$MyClassID)->get();
        foreach ($ClassStudentData as $data2) {
            $CheckStudentExist=StudentFinalTermActivityRecord::where('final_activity_id',$this->ActivityID)->where('student_id',$data2->student_id)->get();
            if (count($CheckStudentExist)==0) {
                $data3 = ([
                    'final_activity_id'  => $this->ActivityID,
                    'student_id'            => $data2->student_id,
                ]);
                StudentFinalTermActivityRecord::create($data3);
            }
        }
        $StudentFinalTermActivityRecordData=StudentFinalTermActivityRecord::where('final_activity_id',$this->ActivityID)->get();
        foreach ($StudentFinalTermActivityRecordData as $data2) {
            $CheckClassStudentExist=ClassStudent::where('my_class_id',$MyClassID)->where('student_id',$data2->student_id)->get();
            if (count($CheckClassStudentExist)==0) {
                StudentFinalTermActivityRecord::destroy($data2->id);
            }
        }
        
        // $CountAllData=StudentFinalTermActivityRecord::where('final_activity_id',$this->ActivityID)->get();
        // foreach ($CountAllData as $index => $countalldata){
        //     $this->Scores[$index] = [
        //     'id' => $countalldata->id,
        //     'student_name'=>$countalldata->getUser->name,
        //     'score'=>$countalldata->score,
        //     ];
        // }
    }

    public function render()
    {
        // $CountAllData=StudentFinalTermActivityRecord::where('final_activity_id',$this->ActivityID)->get();
        $CountAllData=StudentFinalTermActivityRecord::join('users', 'student_final_term_activity_records.student_id', '=', 'users.id')
        ->select('student_final_term_activity_records.id as record_id', 'users.id as user_id', 'users.name', 'student_final_term_activity_records.score')
        ->where('student_final_term_activity_records.final_activity_id', $this->ActivityID)
        ->orderBy('users.name', 'asc')
        ->get();

        foreach ($CountAllData as $index => $countalldata){
            $this->Scores[$index] = [
            'id' => $countalldata->record_id,
            'student_name'=>$countalldata->name,
            'score'=>$countalldata->score,
            ];
        }
        
        $this->dispatch('DispatchTable');
        return view('livewire.instructor-panel.my-class.view-final-term-activity-record-form',[
            'FinalTermActivityData'   =>  StudentFinalTermActivityRecord::where('final_activity_id',$this->ActivityID)->get()
        ])->with('getUser');
    }

    public function OpenScannerFinalTerm(){
        $this->dispatch('OpenScannerFinalTermModal');
        $this->dispatch('ScannerFinalTerm',$this->ActivityID,$this->maximum_score);
    }
    
    public function Store()
    {
        $total_validation="nullable|lte:".$this->maximum_score;
        $this->validate([
            'Scores'            => 'array|required',
            'Scores.*.score'    => $total_validation,
        ]);
        $this->dispatch('CloseViewFinaltermActivityRecordModal');
        
        try {
            foreach ($this->Scores as $index => $Scores) {
                    if($Scores['score']==""){
                        $Scores['score']=null;
                    }
                    $data = ([
                        'score'                         =>  $Scores['score'],
                    ]);
                    StudentFinalTermActivityRecord::find($Scores['id'])->update($data);
            }
                $this->dispatch('alert_store');
            
        } catch (\Exception $e) {
			dd($e);
			return back();
        }
        
        $this->dispatch('CloseViewFinaltermActivityRecordForm');
    
    }

    public function CloseViewFinaltermActivityRecordForm()
    {
        $this->dispatch('CloseViewFinaltermActivityRecordModal');
        $this->dispatch('refresh_class_work_final_term_table');
        $this->resetValidation();
        $this->reset();
    }
}
