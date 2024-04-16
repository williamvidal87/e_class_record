<?php

namespace App\Livewire\AdminPanel\Subject;

use App\Models\Subject;
use Livewire\Component;

class SubjectForm extends Component
{
    public  $subject,
            $description;
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
        ]);
        
        $this->dispatch('CloseSubjectModal');
        
        $data = ([
            'subject'               => $this->subject,
            'description'           => $this->description
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
