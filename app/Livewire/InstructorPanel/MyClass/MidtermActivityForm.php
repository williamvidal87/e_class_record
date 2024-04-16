<?php

namespace App\Livewire\InstructorPanel\MyClass;

use App\Models\MidTermActivity;
use Livewire\Component;

class MidtermActivityForm extends Component
{
    public  $activity_name,
            $date,
            $maximum_score;
    public  $activity_category_name;
    public  $ClassWorkMidTermID;
    public  $MidTermActivityID;
    protected $listeners = [
        'MidtermActivity',
        'CloseMidtermActivityForm',
        'EditMidtermActivity'
    ];

    public function MidtermActivity($ClassWorkMidTermID,$activity_category_name)
    {
        $this->ClassWorkMidTermID = $ClassWorkMidTermID;
        $this->activity_category_name = $activity_category_name;
    }

    public function EditMidtermActivity($MidTermActivityID)
    {
        $this->MidTermActivityID=$MidTermActivityID;
        $data=MidTermActivity::where('id',$MidTermActivityID)->first();
        $this->activity_name=$data->activity_name;
        $this->date=$data->date;
        $this->maximum_score=$data->maximum_score;
    }

    public function render()
    {
        return view('livewire.instructor-panel.my-class.midterm-activity-form');
    }
    
    public function Store()
    {
        $this->validate([
            'activity_name'     => 'required',
            'date'              => '',
            'maximum_score'     => 'required',
        ]);
        
        $this->dispatch('CloseMidtermActivityModal');
        
        $data = ([
            'activity_category_id'  => $this->ClassWorkMidTermID,
            'activity_name'         => $this->activity_name,
            'date'                  => $this->date,
            'maximum_score'         => $this->maximum_score,
        ]);

        try {
            if($this->MidTermActivityID){
                MidTermActivity::find($this->MidTermActivityID)->update($data);
                $this->dispatch('alert_update');
            }else{
                MidTermActivity::create($data);
                $this->dispatch('alert_store');
                
            }
            
        } catch (\Exception $e) {
			dd($e);
			return back();
        }
        
        $this->dispatch('CloseMidtermActivityForm');
    
    }

    public function CloseMidtermActivityForm()
    {
        $this->dispatch('CloseMidtermActivityModal');
        $this->dispatch('refresh_class_work_mid_term_table');
        $this->resetValidation();
        $this->reset();
    }
}
