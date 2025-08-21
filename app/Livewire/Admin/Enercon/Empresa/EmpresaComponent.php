<?php

namespace App\Livewire\Admin\Enercon\Empresa;

use Livewire\Component;
use App\Models\Admin\Enercon\Obra\Empresa;
use Livewire\WithPagination;


class EmpresaComponent extends Component
{
     use WithPagination;

    public $EmpresaId;
    public $nome;
    public $estado;
    public $status = 'ativa';
    public $cep;
    public $search = '';
    public $isOpen = false;
    public $isView = false;

    protected $paginationTheme = 'bootstrap';

    protected $rules = [
        'nome' => 'required|min:3',
        'estado' => 'required',
        'status' => 'required|in:ativo,inativo',
        'cep' => 'required|min:8'
    ];

    public function render()
    {
        $empresas = Empresa::where('nome', 'like', '%' . $this->search . '%')
            ->orWhere('estado', 'like', '%' . $this->search . '%')
            ->paginate(10);

        return view('livewire.admin.enercon.empresa.empresa-component', compact('empresas'));
    }

    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }

    public function openModal()
    {
        $this->isOpen = true;
        $this->isView = false;
    }

    public function closeModal()
    {
        $this->isOpen = false;
        $this->isView = false;
    }

    private function resetInputFields()
    {
        $this->empresaId = null;
        $this->nome = '';
        $this->estado = '';
        $this->status = 'ativo';
        $this->cep ='';
    }

    public function store()
    {
        $this->validate();

        Cidade::updateOrCreate(['id' => $this->empresaId], [
            'nome' => $this->nome,
            'estado' => $this->estado,
            'status' => $this->status,
            'cep' =>$this->cep
        ]);

        session()->flash('message',
            $this->empresaId ? 'Empresa atualizada com sucesso.' : 'Empresa criada com sucesso.');

        $this->closeModal();
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $empresa = Empresa::findOrFail($id);
        $this->empresaId = $id;
        $this->nome = $empresa->nome;
        $this->estado = $empresa->estado;
        $this->status = $empresa->status;
        $this->cep = $empresa->cep;

        $this->openModal();
    }

    public function view($id)
    {
        $empresa = Empresa::findOrFail($id);
        $this->empresaId = $id;
        $this->nome = $empresa->nome;
        $this->estado = $empresa->estado;
        $this->status = $empresa->status;
        $this->cep = $empresa->cep;

        $this->isOpen = true;
        $this->isView = true;
    }

    public function delete($id)
    {
        Empresa::find($id)->delete();
        session()->flash('message', 'Empresa deletada com sucesso.');
    }
}
