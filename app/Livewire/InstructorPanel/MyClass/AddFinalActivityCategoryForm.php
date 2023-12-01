<?php

namespace App\Livewire\InstructorPanel\MyClass;

use App\Models\FinalActivityCategory;
use Livewire\Component;

class AddFinalActivityCategoryForm extends Component
{
    public  $activity_category,
            $percentage,
            $multiply,
            $addition;
    public  $my_class_id;
    public  $AddFinalActivityCategoryID;
    
    protected $listeners = [
        'AddFinalActivityCategoryMyClassID',
        'CloseAddFinalActivityCategoryForm',
        'EditAddFinalActivityCategory'
    ];
    
    public function AddFinalActivityCategoryMyClassID($my_class_id)
    {
        $this->my_class_id=$my_class_id;
    }
    
    public function EditAddFinalActivityCategory($AddFinalActivityCategoryID,$my_class_id)
    {
        $this->AddFinalActivityCategoryID=$AddFinalActivityCategoryID;
        $this->my_class_id=$my_class_id;
        $data=FinalActivityCategory::where('id',$this->AddFinalActivityCategoryID)->first();
        $this->activity_category = $data->activity_category;
        $this->percentage = $data->percentage;
        $this->multiply = $data->multiply;
        $this->addition = $data->addition;
    }
    
    public function render()
    {
        return view('livewire.instructor-panel.my-class.add-final-activity-category-form');
    }
    
    public function Store()
    {
        $this->validate([
            'activity_category' => 'required',
            'percentage'        => 'required',
            'multiply'          => 'required',
            'addition'          => 'required',
        ]);
        
        $this->dispatch('CloseAddFinalActivityCategoryModal');
        
        $data = ([
            'my_class_id'       => $this->my_class_id,
            'activity_category' => $this->activity_category,
            'percentage'        => $this->percentage,
            'multiply'          => $this->multiply,
            'addition'          => $this->addition,
        ]);
        
        try {
            if($this->AddFinalActivityCategoryID){
                FinalActivityCategory::find($this->AddFinalActivityCategoryID)->update($data);
                $this->dispatch('alert_update');
            }else{
                FinalActivityCategory::create($data);
                $this->dispatch('alert_store');
                
            }
        
        } catch (\Exception $e) {
			dd($e);
			return back();
        }
        
        $this->dispatch('CloseAddFinalActivityCategoryForm');
    
    }
    
    public function CloseAddFinalActivityCategoryForm()
    {
        $this->dispatch('CloseAddFinalActivityCategoryModal');
        $this->dispatch('refresh_view_my_class_table');
        $this->resetValidation();
        $this->reset();
    }
}
