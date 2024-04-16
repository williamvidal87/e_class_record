<?php

namespace App\Livewire\InstructorPanel\MyClass;

use App\Models\FinalActivityCategory;
use App\Models\FinalTermActivity;
use Livewire\Component;

class ClassWorkFinalTermForm extends Component
{
    public  $MyClassID,
            $activity_category;
    public  $ClassWorkFinalTermID;
    protected $listeners = [
        'ClassWorkFinalTermID',
        'refresh_class_work_final_term_table' => '$refresh',
        'DeletedFinaltermActivity'
    ];

    public function ClassWorkFinalTermID($ClassWorkFinalTermID,$MyClassID)
    {
        $this->ClassWorkFinalTermID=$ClassWorkFinalTermID;
        $this->MyClassID=$MyClassID;
        $data=FinalActivityCategory::where('id',$ClassWorkFinalTermID)->first();
        $this->activity_category=$data->activity_category;
    }

    public function render()
    {
        $this->dispatch('DispatchTable');
        return view('livewire.instructor-panel.my-class.class-work-final-term-form',[
            'FinalActivityData' =>   FinalTermActivity::where('activity_category_id',$this->ClassWorkFinalTermID)->get()
            ]);
    }

    public function OpenFinaltermActivityForm()
    {
        $this->dispatch('OpenFinaltermActivityModal');
        $this->dispatch('FinaltermActivityPassData',$this->ClassWorkFinalTermID,$this->activity_category);
    }

    public function EditFinaltermActivityForm($FinalTermActivityID)
    {
        $this->dispatch('OpenFinaltermActivityModal');
        $this->dispatch('FinaltermActivityPassData',$this->ClassWorkFinalTermID,$this->activity_category);
        $this->dispatch('EditFinaltermActivity',$FinalTermActivityID);
    }

    public function OpenViewRecordFinaltermActivityRecord($ActivityID)
    {
        $this->dispatch('OpenViewFinaltermActivityRecordModal');
        $this->dispatch('ViewFinaltermActivity',$ActivityID,$this->MyClassID);
    }

    public function CloseClassWorkFinalTermForm()
    {
        $this->dispatch('CloseClassWorkFinalTermModal');
        $this->dispatch('refresh_view_my_class_table');
        $this->resetValidation();
        $this->reset();
    }
    
    public function DeleteFinaltermActivity($FinalTermActivityID)
    {
        $this->dispatch('DeleteConfirmFinaltermActivity',$FinalTermActivityID);
    }
    
    public function DeletedFinaltermActivity($FinalTermActivityID)
    {
        FinalTermActivity::destroy($FinalTermActivityID);
        $this->dispatch('alert_delete');
    }
}
