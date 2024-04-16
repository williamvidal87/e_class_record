<?php

namespace App\Livewire\InstructorPanel\QrScanner;

use App\Models\StudentFinalTermActivityRecord;
use Livewire\Component;

class QrScannerFinalTermForm extends Component
{
    public  $ActivityID,
            $maximum_score;
    public  $IdNumber;
    public  $TempIdNumber,
            $TempPhoto,
            $TempName;
    protected $listeners = [
        'ScannerFinalTerm',
        'UpdateFinalTermScore'
    ];

    public function ScannerFinalTerm($ActivityID,$maximum_score)
    {
        // dd($ActivityID);
        $this->ActivityID = $ActivityID;
        $this->maximum_score = $maximum_score;
    }

    public function render()
    {
        return view('livewire.instructor-panel.qr-scanner.qr-scanner-final-term-form',[
            'StudentFinalTermActivityRecordData' => StudentFinalTermActivityRecord::where('final_activity_id',$this->ActivityID)->get()
        ])->with('getUser');
    }

    public function UpdateFinalTermScore($StudentFinalTermActivityRecordID){
        $data = ([
            'score'       => $this->maximum_score,
        ]);
        StudentFinalTermActivityRecord::find($StudentFinalTermActivityRecordID)->update($data);

    }

    public function CloseScannerFinalTerm()
    {   
        $this->dispatch('CloseScannerFinalTermModal');
        $this->dispatch('refresh_view_final_term_table');
        $this->resetValidation();
        $this->reset();
    }
}
