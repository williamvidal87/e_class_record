<?php

namespace App\Livewire\StudentPanel\StudentDashboard;

use App\Models\ClassStudent;
use Livewire\Component;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class JoinClassCodeForm extends Component
{
    public $ClassCode;
    public $classcodeMessage;
    public $decrypted;
    public $listeners = ['CloseJoinClassCodeForm'];

    public function render()
    {
        return view('livewire.student-panel.student-dashboard.join-class-code-form');
    }

    public function Store()
    {
        $this->classcodeMessage=null;
        try {
            $this->decrypted = Crypt::decryptString($this->ClassCode);
            
        } catch (DecryptException $e) {
            $this->classcodeMessage = "The selected class code is invalid.";
			return back();
        }
        $ClassStudentData=ClassStudent::where('my_class_id',$this->decrypted)->where('student_id',Auth::user()->id)->first();
        if ($ClassStudentData) {
                $this->classcodeMessage = "You are Already in This Class.";
			    return back();
        } else {
        $this->dispatch('CloseJoinClassCodeModal');
            $data = ([
                'my_class_id'       => $this->decrypted,
                'student_id'        => Auth::user()->id,
            ]);
            ClassStudent::create($data);
            $this->dispatch('alert_joined');
        }
        $this->dispatch('CloseJoinClassCodeForm');
    
    }

    public function CloseJoinClassCodeForm(){
        $this->dispatch('CloseJoinClassCodeModal');
        $this->dispatch('refresh_student_dashboard');
        $this->resetValidation();
        $this->reset();
    }
}
