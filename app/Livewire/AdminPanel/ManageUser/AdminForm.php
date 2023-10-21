<?php

namespace App\Livewire\AdminPanel\ManageUser;

use Livewire\Component;

class AdminForm extends Component
{
    public function render()
    {
        return view('livewire.admin-panel.manage-user.admin-form');
    }
    
    public function CloseAdminForm()
    {   
        $this->dispatch('CloseAdminModal');
        $this->dispatch('refresh_admin_table');
        $this->dispatch('EmitTable');
        
    }
}
