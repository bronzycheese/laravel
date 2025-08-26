<?php

namespace App\Livewire\Admin\App\Acesso;

use Livewire\Component;

use App\Models\Admin\Chatpovo\User;
use Livewire\WithPagination;

class AcessoComponent extends Component
{
    use WithPagination;   

    public function render()
    {       
        return view('livewire.admin.app.acesso.acesso-component');
    }
}
