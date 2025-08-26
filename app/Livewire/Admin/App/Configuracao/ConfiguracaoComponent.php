<?php

namespace App\Livewire\Admin\App\Configuracao;

use Livewire\Component;

use Livewire\WithPagination;

class ConfiguracaoComponent extends Component
{

    public $sistemaId;
    public $api, $nome, $logo, $descricao, $cor, $icone, $ativo = true;

    public function render()
    {
        return view('livewire.admin.app.configuracao.configuracao-component');
    }

    public function save()
    {
        dd('ok');
    }
   
}
