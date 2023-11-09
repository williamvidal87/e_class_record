<?php

namespace App\Livewire\Dashboard;

use App\Models\Course;
use App\Models\User;
use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        return view('livewire.dashboard.dashboard',[
            'InstructorData' =>   User::all()->where('rule_id',2),
            'StudentData' =>   User::all()->where('rule_id',3),
            'CourseData' =>   Course::all(),
            ]);
    }
}
