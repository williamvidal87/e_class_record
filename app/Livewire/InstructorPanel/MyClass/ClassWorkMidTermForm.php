<?php

namespace App\Livewire\InstructorPanel\MyClass;

use App\Models\ActivityCategory;
use App\Models\MidTermActivity;
use Livewire\Component;

class ClassWorkMidTermForm extends Component
{
    public  $MyClassID,
            $activity_category;
    public  $ClassWorkMidTermID;
    protected $listeners = [
        'ClassWorkMidTermID',
        'refresh_class_work_mid_term_table' => '$refresh',
        'DeletedMidtermActivity'
    ];

    public function ClassWorkMidTermID($ClassWorkMidTermID,$MyClassID)
    {
        $this->ClassWorkMidTermID=$ClassWorkMidTermID;
        $this->MyClassID=$MyClassID;
        $data=ActivityCategory::where('id',$ClassWorkMidTermID)->first();
        $this->activity_category=$data->activity_category;
    }

    public function render()
    {
        $this->dispatch('DispatchTable');
        return view('livewire.instructor-panel.my-class.class-work-mid-term-form',[
            'ActivityData' =>   MidTermActivity::where('activity_category_id',$this->ClassWorkMidTermID)->get()
            ]);
    }

    public function OpenMidtermActivityForm()
    {
        $this->dispatch('OpenMidtermActivityModal');
        $this->dispatch('MidtermActivity',$this->ClassWorkMidTermID,$this->activity_category);
    }

    public function EditMidtermActivityForm($MidTermActivityID)
    {
        $this->dispatch('OpenMidtermActivityModal');
        $this->dispatch('MidtermActivity',$this->ClassWorkMidTermID,$this->activity_category);
        $this->dispatch('EditMidtermActivity',$MidTermActivityID);
    }

    public function OpenViewRecordMidtermActivityRecord($ActivityID)
    {
        $this->dispatch('OpenViewMidtermActivityRecordModal');
        $this->dispatch('ViewMidtermActivity',$ActivityID,$this->MyClassID);
    }

    public function CloseClassWorkMidTermForm()
    {
        $this->dispatch('CloseClassWorkMidTermModal');
        $this->dispatch('refresh_view_my_class_table');
        $this->resetValidation();
        $this->reset();
    }
    
    public function DeleteMidtermActivity($MidTermActivityID)
    {
        $this->dispatch('DeleteConfirmMidtermActivity',$MidTermActivityID);
    }
    
    public function DeletedMidtermActivity($MidTermActivityID)
    {
        MidTermActivity::destroy($MidTermActivityID);
        $this->dispatch('alert_delete');
    }
}
