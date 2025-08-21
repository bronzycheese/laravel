<?php

namespace App\Livewire\Admin\Enercon\Empresa;

use Livewire\Component;
use App\Models\Admin\Enercon\Obra\Empresa;

class EmpresaComponent extends Component
{
    public $empresas;
    public $empresaId;
    public $nome;
    public $telefone;
    public $CEP;

    public $modoEdicao = false;

    public function mount()
    {
        $this->carregarEmpresas();
    }

    public function carregarEmpresas()
    {
        $this->empresas = Empresas::all();

    }

    public function salvar()
    {
        $this->validate([
            'nome' => 'required|string|max:255',
            'telefone' => 'nullable|string|max:20',
            'CEP' => 'required|integer|max:10',
        ]);

        if ($this->modoEdicao) {
            Empresa::find($this->empresaId)->update([
                'nome' => $this->nome,
                'telefone' => $this->telefone,
                'CEP' => $this->CEP,
            ]);
        } else {
            Empresa::create([
                'nome' => $this->nome,
                'telefone' => $this->telefone,
                'CEP' => $this->CEP,
            ]);
        }

        $this->resetCampos();
        $this->carregarEmpresas();
    }

    public function editar($id)
    {
        $empresa = Empresa::find($id);
        $this->empresaId = $empresa->id;
        $this->nome = $empresa->nome;
        $this->telefone = $empresa->telefone;
        $this->CEP = $empresa->CEP;
        $this->modoEdicao = true;
    }

    public function excluir($id)
    {
        Empresa::destroy($id);
        $this->carregarEmpresas();
    }

    public function resetCampos()
    {
        $this->empresaId = null;
        $this->nome = '';
        $this->telefone = '';
        $this->CEP = '';
        $this->modoEdicao = false;
    }

    public function render()
    {
        return view('livewire.admin.enercon.empresa.empresa-component');
    }
}
