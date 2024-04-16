<?php

namespace App\Livewire\AdminPanel\ManageUser;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AdminTable extends Component
{
    protected $listeners = [
        'refresh_admin_table' => '$refresh',
        'EditAdmin',
        'Deleted'
    ];
    
    public function render()
    {
        $this->dispatch('DispatchTable');
        return view('livewire.admin-panel.manage-user.admin-table',[
        'AdminData' =>   User::all()->where('rule_id',1)->whereNotIn('id',Auth::user()->id)
        ]);
    }
    
    public function OpenAdminForm()
    {
        $this->dispatch('OpenAdminModal');
    }
    
    public function EditAdmin($UserID)
    {
        $this->dispatch('UserID',$UserID);
        $this->dispatch('OpenAdminModal');
    }
    
    public function DeleteAdmin($UserID)
    {
        $this->dispatch('DeleteConfirm',$UserID);
    }
    
    public function Deleted($UserID)
    {
        User::destroy($UserID);
        $this->dispatch('alert_delete');
    }
}
