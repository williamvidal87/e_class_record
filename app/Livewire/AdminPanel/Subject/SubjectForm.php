<?php

namespace App\Livewire\AdminPanel\Subject;

use App\Models\Subject;
use Livewire\Component;

class SubjectForm extends Component
{
    public  $subject,
            $description,
            $unit;
    public  $SubjectID;
    
    protected $listeners = [
        'CloseSubjectForm',
        'SubjectID'
    ];
    
    public function SubjectID($SubjectID){
        $this->SubjectID = $SubjectID;
        $data=Subject::find($SubjectID);
        $this->subject = $data['subject'];
        $this->description = $data['description'];
        $this->unit = $data['unit'];
    }
    
    public function render()
    {
        return view('livewire.admin-panel.subject.subject-form');
    }
    
    public function Store()
    {
        $this->validate([
            'subject'               => 'required',
            'description'           => 'required',
            'unit'                  => 'required',
        ]);
        
        $this->dispatch('CloseSubjectModal');
        
        $data = ([
            'subject'               => $this->subject,
            'description'           => $this->description,
            'unit'                  => $this->unit
        ]);
        try {
            if($this->SubjectID){
                Subject::find($this->SubjectID)->update($data);
                $this->dispatch('alert_update');
            }else{
                Subject::create($data);
                $this->dispatch('alert_store');
                
            }
            
        } catch (\Exception $e) {
			dd($e);
			return back();
        }
        
        $this->dispatch('CloseSubjectForm');
    
    }
    
    public function CloseSubjectForm()
    {   
        $this->dispatch('CloseSubjectModal');
        $this->dispatch('refresh_subject_table');
        $this->resetValidation();
        $this->reset();
        
    }
}
