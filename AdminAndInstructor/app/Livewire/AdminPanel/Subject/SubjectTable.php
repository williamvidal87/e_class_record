<?php

namespace App\Livewire\AdminPanel\Subject;

use App\Models\Subject;
use Livewire\Component;

class SubjectTable extends Component
{
    protected $listeners = [
        'refresh_subject_table' => '$refresh',
        'EditSubject',
        'Deleted'
    ];
    
    public function render()
    {
        $this->dispatch('DispatchTable');
        return view('livewire.admin-panel.subject.subject-table',[
            'SubjectData' =>   Subject::all()
            ]);
    }
    
    public function OpenSubjectForm()
    {
        $this->dispatch('OpenSubjectModal');
    }
    
    public function EditSubject($SubjectID)
    {
        $this->dispatch('SubjectID',$SubjectID);
        $this->dispatch('OpenSubjectModal');
    }
    
    public function DeleteSubject($SubjectID)
    {
        $this->dispatch('DeleteConfirm',$SubjectID);
    }
    
    public function Deleted($SubjectID)
    {
        Subject::destroy($SubjectID);
        $this->dispatch('alert_delete');
    }
}
