<?php

namespace App\Livewire\Admin\App\Dashboard;

use Livewire\Component;

use Livewire\WithPagination;

class DashboardComponent extends Component
{

    use WithPagination;   

    public function render()
    {       
        return view('livewire.admin.app.dashboard.dashboard-component');
    }
}
