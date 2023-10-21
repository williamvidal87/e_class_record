<?php

namespace App\Livewire\AdminPanel\ManageUser;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AdminTable extends Component
{
    protected $listeners = [
        'refresh_admin_table' => '$refresh'
    ];
    
    
    public function render()
    {
        return view('livewire.admin-panel.manage-user.admin-table',[
        'AdminData' =>   User::all()->where('rule_id',1)->whereNotIn('id',Auth::user()->id)
        ]);
    }
    
    
    public function OpenAdminForm()
    {   
        $this->dispatch('OpenAdminModal');
    }
}
