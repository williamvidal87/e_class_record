<?php

namespace App\Livewire\AdminPanel\ComputationGrade;

use App\Models\ComputationGrade;
use Livewire\Component;

class ComputationGradeTable extends Component
{
    protected $listeners = [
        'refresh_computation_grade_table' => '$refresh',
        'EditComputationGrade',
        'Deleted'
    ];
    
    public function render()
    {
        $this->dispatch('DispatchTable');
        return view('livewire.admin-panel.computation-grade.computation-grade-table',[
            'ComputationGradeData' =>   ComputationGrade::all()
            ]);
    }
    
    public function OpenComputationGradeForm()
    {
        $this->dispatch('OpenComputationGradeModal');
    }
    
    public function EditComputationGrade($ComputationGradeID)
    {
        $this->dispatch('ComputationGradeID',$ComputationGradeID);
        $this->dispatch('OpenComputationGradeModal');
    }
    
    public function DeleteComputationGrade($ComputationGradeID)
    {
        $this->dispatch('DeleteConfirm',$ComputationGradeID);
    }
    
    public function Deleted($ComputationGradeID)
    {
        ComputationGrade::destroy($ComputationGradeID);
        $this->dispatch('alert_delete');
    }
}
