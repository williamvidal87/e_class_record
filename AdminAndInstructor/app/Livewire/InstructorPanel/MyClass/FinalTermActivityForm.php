<?php

namespace App\Livewire\InstructorPanel\MyClass;

use App\Models\FinalTermActivity;
use Livewire\Component;

class FinalTermActivityForm extends Component
{
    public  $activity_name,
            $date,
            $maximum_score;
    public  $activity_category_name;
    public  $ClassWorkFinalTermID;
    public  $FinalTermActivityID;
    protected $listeners = [
        'FinaltermActivityPassData',
        'CloseFinaltermActivityForm',
        'EditFinaltermActivity'
    ];

    public function FinaltermActivityPassData($ClassWorkFinalTermID,$activity_category_name)
    {
        $this->ClassWorkFinalTermID = $ClassWorkFinalTermID;
        $this->activity_category_name = $activity_category_name;
    }

    public function EditFinaltermActivity($FinalTermActivityID)
    {
        $this->FinalTermActivityID=$FinalTermActivityID;
        $data=FinalTermActivity::where('id',$FinalTermActivityID)->first();
        $this->activity_name=$data->activity_name;
        $this->date=$data->date;
        $this->maximum_score=$data->maximum_score;
    }

    public function render()
    {
        return view('livewire.instructor-panel.my-class.final-term-activity-form');
    }
    
    public function Store()
    {
        $this->validate([
            'activity_name'     => 'required',
            'date'              => '',
            'maximum_score'     => 'required',
        ]);
        
        $this->dispatch('CloseFinaltermActivityModal');
        
        $data = ([
            'activity_category_id'  => $this->ClassWorkFinalTermID,
            'activity_name'         => $this->activity_name,
            'date'                  => $this->date,
            'maximum_score'         => $this->maximum_score,
        ]);

        try {
            if($this->FinalTermActivityID){
                FinalTermActivity::find($this->FinalTermActivityID)->update($data);
                $this->dispatch('alert_update');
            }else{
                FinalTermActivity::create($data);
                $this->dispatch('alert_store');
                
            }
            
        } catch (\Exception $e) {
			dd($e);
			return back();
        }
        
        $this->dispatch('CloseFinaltermActivityForm');
    
    }

    public function CloseFinaltermActivityForm()
    {
        $this->dispatch('CloseFinaltermActivityModal');
        $this->dispatch('refresh_class_work_final_term_table');
        $this->resetValidation();
        $this->reset();
    }
}
