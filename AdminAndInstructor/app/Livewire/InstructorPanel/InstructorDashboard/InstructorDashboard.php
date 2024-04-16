<?php

namespace App\Livewire\InstructorPanel\InstructorDashboard;

use App\Models\MyClass;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class InstructorDashboard extends Component
{
    public function render()
    {
        return view('livewire.instructor-panel.instructor-dashboard.instructor-dashboard',[
            'MyClassData' =>  MyClass::all()->where('instructor_id',Auth::user()->id),
            'StudentData' =>  User::all()->where('rule_id',3),
            'SubejectData' =>  Subject::all()
        ]);
    }
}
