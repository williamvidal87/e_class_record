<?php

namespace App\Livewire\StudentPanel\StudentDashboard;

use Livewire\Component;

class ViewGradeForm extends Component
{
    public  $GradeID;
    protected $listeners = [
        'ViewGradeID'
    ];

    public function ViewGradeID($GradeID)
    {
        $this->GradeID=$GradeID;
    }
    public function render()
    {
        return view('livewire.student-panel.student-dashboard.view-grade-form');
    }
}
