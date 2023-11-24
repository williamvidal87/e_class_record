<?php

namespace App\Livewire\InstructorPanel\MyClass;

use App\Models\ActivityCategory;
use Livewire\Component;

class AddActivityCategoryForm extends Component
{
    public  $activity_category,
            $percentage,
            $multiply,
            $addition;
    public  $my_class_id;
    public  $AddActivityCategoryID;
    
    protected $listeners = [
        'AddActivityCategoryMyClassID',
        'CloseAddActivityCategoryForm',
        'EditAddActivityCategory'
    ];
    
    public function AddActivityCategoryMyClassID($my_class_id)
    {
        $this->my_class_id=$my_class_id;
    }
    
    public function EditAddActivityCategory($AddActivityCategoryID,$my_class_id)
    {
        $this->AddActivityCategoryID=$AddActivityCategoryID;
        $this->my_class_id=$my_class_id;
        $data=ActivityCategory::where('id',$this->AddActivityCategoryID)->first();
        $this->activity_category = $data->activity_category;
        $this->percentage = $data->percentage;
        $this->multiply = $data->multiply;
        $this->addition = $data->addition;
    }
    
    public function render()
    {
        return view('livewire.instructor-panel.my-class.add-activity-category-form');
    }
    
    public function Store()
    {
        $this->validate([
            'activity_category' => 'required',
            'percentage'        => 'required',
            'multiply'          => 'required',
            'addition'          => 'required',
        ]);
        
        $this->dispatch('CloseAddActivityCategoryModal');
        
        $data = ([
            'my_class_id'       => $this->my_class_id,
            'activity_category' => $this->activity_category,
            'percentage'        => $this->percentage,
            'multiply'          => $this->multiply,
            'addition'          => $this->addition,
        ]);
        
        try {
            if($this->AddActivityCategoryID){
                ActivityCategory::find($this->AddActivityCategoryID)->update($data);
                $this->dispatch('alert_update');
            }else{
                ActivityCategory::create($data);
                $this->dispatch('alert_store');
                
            }
        
        } catch (\Exception $e) {
			dd($e);
			return back();
        }
        
        $this->dispatch('CloseAddActivityCategoryForm');
    
    }
    
    public function CloseAddActivityCategoryForm()
    {
        $this->dispatch('CloseAddActivityCategoryModal');
        $this->dispatch('refresh_view_my_class_table');
        $this->resetValidation();
        $this->reset();
    }
}
