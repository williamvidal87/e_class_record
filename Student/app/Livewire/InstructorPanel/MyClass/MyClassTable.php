<?php

namespace App\Livewire\InstructorPanel\MyClass;

use App\Models\MyClass;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class MyClassTable extends Component
{
    protected $listeners = [
        'refresh_my_class_table' => '$refresh',
        'EditMyClass',
        'Deleted'
    ];
    
    public function render()
    {
        $this->dispatch('DispatchTable');
        return view('livewire.instructor-panel.my-class.my-class-table',[
            'MyClassData' =>   MyClass::where('instructor_id',Auth::user()->id)->get()
            ])->with('getSemester','getSubject');
    }
    
    public function OpenMyClassForm()
    {
        $this->dispatch('OpenMyClassModal');
    }
    
    public function EditMyClass($MyClassID)
    {
        $this->dispatch('MyClassID',$MyClassID);
        $this->dispatch('OpenMyClassModal');
    }
    
    public function ViewMyClass($MyClassID)
    {
        $this->dispatch('ViewMyClassID',$MyClassID);
        $this->dispatch('OpenViewMyClassModal');
    }

    public function ViewClassRecord($MyClassID)
    {
        $this->dispatch('ViewClassRecordID',$MyClassID);
        $this->dispatch('OpenViewClassRecordModal');
    }
    
    public function DeleteMyClass($MyClassID)
    {
        $this->dispatch('DeleteConfirm',$MyClassID);
    }
    
    public function Deleted($MyClassID)
    {
        MyClass::destroy($MyClassID);
        $this->dispatch('alert_delete');
    }
}
