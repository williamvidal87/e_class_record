<?php

namespace App\Livewire\InstructorPanel\MyClass;

use App\Models\ActivityCategory;
use App\Models\ClassStudent;
use App\Models\MyClass;
use App\Models\User;
use Livewire\Component;

class ViewMyClassForm extends Component
{
    public  $semester_id,
            $school_year,
            $subject_id,
            $section,
            $schedule;
    public  $MyClassID;
    public  $ClassStudentID;
    public  $ActivityCategoryID;
    public  $SubjectTitle;
    protected $listeners = [
        'ViewMyClassID',
        'refresh_view_my_class_table' => '$refresh',
        'Removed',
        'RemovedActivityCategory'
    ];
    
    public function ViewMyClassID($MyClassID)
    {
        $this->MyClassID = $MyClassID;
        $data=MyClass::where('id',$MyClassID)->first();
        $this->semester_id = $data->semester_id;
        $this->school_year = $data->school_year;
        $this->subject_id = $data->subject_id;
        $this->section = $data->section;
        $this->schedule = $data->schedule;
        $this->SubjectTitle=$data->getSubject->subject." ".$data->getSubject->description." - ".$this->section." (".$this->schedule.")";
    }
    
    public function render()
    {
        $this->dispatch('DispatchTable');
        return view('livewire.instructor-panel.my-class.view-my-class-form',[
            'ClassStudentData' =>   ClassStudent::where('my_class_id',$this->MyClassID)->get(),
            'ActivityCategoryData' =>   ActivityCategory::where('my_class_id',$this->MyClassID)->get(),
            'Percentage'  =>  ActivityCategory::where('my_class_id',$this->MyClassID)->sum('percentage')
            ])->with('getStudent');
    }
    
    public function OpenAddStudentForm()
    {
        $this->dispatch('OpenAddStudentModal');
        $this->dispatch('AddMyClassID',$this->MyClassID);
    }
    
    public function OpenAddActivityCategoryForm()
    {
        $this->dispatch('OpenAddActivityCategoryModal');
        $this->dispatch('AddActivityCategoryMyClassID',$this->MyClassID);
    }
    
    public function OpenClassWorkMidTermForm($ClassWorkMidTermID)
    {
        $this->dispatch('OpenClassWorkMidTermModal');
        $this->dispatch('ClassWorkMidTermID',$ClassWorkMidTermID,$this->MyClassID);
    }

    public function EditAddActivityCategoryForm($AddActivityCategoryID)
    {
        $this->dispatch('OpenAddActivityCategoryModal');
        $this->dispatch('EditAddActivityCategory',$AddActivityCategoryID,$this->MyClassID);
    }
    
    public function Remove($ClassStudentID)
    {
        $this->dispatch('RemoveConfirm',$ClassStudentID);
    }
    
    public function Removed($ClassStudentID)
    {
        ClassStudent::destroy($ClassStudentID);
        $this->dispatch('alert_removed');
    }
    
    public function RemoveActivityCategory($ActivityCategoryID)
    {
        $this->dispatch('RemoveActivityCategoryConfirm',$ActivityCategoryID);
    }
    
    public function RemovedActivityCategory($ActivityCategoryID)
    {
        ActivityCategory::destroy($ActivityCategoryID);
        $this->dispatch('alert_removed');
    }
    
    public function CloseMyClassForm()
    {   
        $this->dispatch('CloseViewMyClassModal');
        $this->dispatch('refresh_my_class_table');
        $this->resetValidation();
        $this->reset();
        
    }
}
