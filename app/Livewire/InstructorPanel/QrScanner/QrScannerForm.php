<?php

namespace App\Livewire\InstructorPanel\QrScanner;

use App\Models\StudentMidTermActivityRecord;
use Livewire\Component;

class QrScannerForm extends Component
{
    public  $ActivityID,
            $maximum_score;
    public  $IdNumber;
    public  $TempIdNumber,
            $TempPhoto,
            $TempName;
    protected $listeners = [
        'Scanner',
        'UpdateMidtermScore'
    ];

    public function Scanner($ActivityID,$maximum_score)
    {
        $this->ActivityID = $ActivityID;
        $this->maximum_score = $maximum_score;
    }

    public function render()
    {
        return view('livewire.instructor-panel.qr-scanner.qr-scanner-form',[
            'StudentMidTermActivityRecordData' => StudentMidTermActivityRecord::where('mid_term_activity_id',$this->ActivityID)->get()
        ])->with('getUser');
    }

    public function UpdateMidtermScore($StudentMidTermActivityRecordID){
        $data = ([
            'score'       => $this->maximum_score,
        ]);
        StudentMidTermActivityRecord::find($StudentMidTermActivityRecordID)->update($data);

    }

    public function CloseScanner()
    {   
        $this->dispatch('CloseScannerModal');
        $this->dispatch('refresh_view_mid_term_table');
        $this->resetValidation();
        $this->reset();
    }
}
