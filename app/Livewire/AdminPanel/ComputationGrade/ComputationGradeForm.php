<?php

namespace App\Livewire\AdminPanel\ComputationGrade;

use App\Models\ComputationGrade;
use Livewire\Component;

class ComputationGradeForm extends Component
{
    public  $computation_name,
            $multiply,
            $addition;
    public  $ComputationGradeID;
    
    protected $listeners = [
        'CloseComputationGradeForm',
        'ComputationGradeID'
    ];
    
    public function ComputationGradeID($ComputationGradeID){
        $this->ComputationGradeID = $ComputationGradeID;
        $data=ComputationGrade::find($ComputationGradeID);
        $this->computation_name = $data['computation_name'];
        $this->multiply = $data['multiply'];
        $this->addition = $data['addition'];
    }
    
    public function render()
    {
        return view('livewire.admin-panel.computation-grade.computation-grade-form');
    }
    
    public function Store()
    {
        $this->validate([
            'computation_name'          => 'required',
            'multiply'                  => 'required',
            'addition'                  => 'required',
        ]);
        
        $this->dispatch('CloseComputationGradeModal');
        
        $data = ([
            'computation_name'          => $this->computation_name,
            'multiply'                  => $this->multiply,
            'addition'                  => $this->addition
        ]);
        try {
            if($this->ComputationGradeID){
                ComputationGrade::find($this->ComputationGradeID)->update($data);
                $this->dispatch('alert_update');
            }else{
                ComputationGrade::create($data);
                $this->dispatch('alert_store');
                
            }
            
        } catch (\Exception $e) {
			dd($e);
			return back();
        }
        
        $this->dispatch('CloseComputationGradeForm');
    
    }
    
    public function CloseComputationGradeForm()
    {   
        $this->dispatch('CloseComputationGradeModal');
        $this->dispatch('refresh_computation_grade_table');
        $this->resetValidation();
        $this->reset();
        
    }
}
