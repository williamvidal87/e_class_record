<?php

namespace App\Livewire\InstructorPanel\MyClass;

use App\Models\MyClass;
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
            'MyClassData' =>   MyClass::all()
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
