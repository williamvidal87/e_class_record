<?php

namespace App\Livewire\AdminPanel\Course;

use App\Models\Course;
use Livewire\Component;

class CourseTable extends Component
{
    protected $listeners = [
        'refresh_course_table' => '$refresh',
        'EditCourse',
        'Deleted'
    ];

    public function render()
    {
        $this->dispatch('DispatchTable');
        return view('livewire.admin-panel.course.course-table',[
            'CourseData' =>   Course::all()
            ]);
    }

    public function OpenCourseForm()
    {
        $this->dispatch('OpenCourseModal');
    }

    public function EditCourse($CourseID)
    {
        $this->dispatch('CourseID',$CourseID);
        $this->dispatch('OpenCourseModal');
    }

    public function DeleteCourse($CourseID)
    {
        $this->dispatch('DeleteConfirm',$CourseID);
    }

    public function Deleted($CourseID)
    {
        Course::destroy($CourseID);
        $this->dispatch('alert_delete');
    }
}
