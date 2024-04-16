<?php

namespace App\Livewire\AdminPanel\Course;

use App\Models\Course;
use Livewire\Component;

class CourseForm extends Component
{
    public  $abbreviation,
            $description;
    public  $CourseID;
    
    protected $listeners = [
        'CloseCourseForm',
        'CourseID'
    ];
    
    public function CourseID($CourseID){
        $this->CourseID = $CourseID;
        $data=Course::find($CourseID);
        $this->abbreviation = $data['abbreviation'];
        $this->description = $data['description'];
    }
    
    public function render()
    {
        return view('livewire.admin-panel.course.course-form');
    }
    
    public function Store()
    {
        $this->validate([
            'abbreviation'          => 'required',
            'description'           => 'required',
        ]);
        
        $this->dispatch('CloseCourseModal');
        
        $data = ([
            'abbreviation'          => $this->abbreviation,
            'description'            => $this->description
        ]);
        try {
            if($this->CourseID){
                Course::find($this->CourseID)->update($data);
                $this->dispatch('alert_update');
            }else{
                Course::create($data);
                $this->dispatch('alert_store');
                
            }
            
        } catch (\Exception $e) {
			dd($e);
			return back();
        }
        
        $this->dispatch('CloseCourseForm');
    
    }
    
    public function CloseCourseForm()
    {   
        $this->dispatch('CloseCourseModal');
        $this->dispatch('refresh_course_table');
        $this->resetValidation();
        $this->reset();
        
    }
}
