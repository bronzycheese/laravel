<?php

namespace App\Livewire\Admin\Enercon\Municipio;

use Livewire\Component;
use App\Models\Admin\Enercon\Obra\Municipio;

class MunicipioComponent extends Component
{
    public $municipios;
    public $municipioId;
    public $nome;
    public $telefone;
    public $status = true;

    public $modoEdicao = false;

    public function mount()
    {
        $this->carregarMunicipios();
    }

    public function carregarMunicipios()
    {
        $this->municipios = Municipio::all();

    }

    public function salvar()
    {
        $this->validate([
            'nome' => 'required|string|max:255',
            'telefone' => 'nullable|string|max:20',
            'status' => 'boolean',
        ]);

        if ($this->modoEdicao) {
            Municipio::find($this->municipioId)->update([
                'nome' => $this->nome,
                'telefone' => $this->telefone,
                'status' => $this->status,
            ]);
        } else {
            Municipio::create([
                'nome' => $this->nome,
                'telefone' => $this->telefone,
                'status' => $this->status,
            ]);
        }

        $this->resetCampos();
        $this->carregarMunicipios();
    }

    public function editar($id)
    {
        $municipio = Municipio::find($id);
        $this->municipioId = $municipio->id;
        $this->nome = $municipio->nome;
        $this->telefone = $municipio->telefone;
        $this->status = $municipio->status;
        $this->modoEdicao = true;
    }

    public function excluir($id)
    {
        Municipio::destroy($id);
        $this->carregarMunicipios();
    }

    public function resetCampos()
    {
        $this->municipioId = null;
        $this->nome = '';
        $this->telefone = '';
        $this->status = true;
        $this->modoEdicao = false;
    }

    public function render()
    {
        return view('livewire.admin.enercon.municipio.municipio-component');
    }
}
