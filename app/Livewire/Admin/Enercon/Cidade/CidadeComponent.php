<?php

namespace App\Livewire\Admin\Enercon\Cidade;

use Livewire\Component;
use App\Models\Admin\Enercon\Cidade;
use Livewire\WithPagination;


class CidadeComponent extends Component
{
     use WithPagination;

    public $cidadeId;
    public $nome;
    public $estado;
    public $status = 'ativo';
    public $search = '';
    public $isOpen = false;
    public $isView = false;

    protected $paginationTheme = 'bootstrap';

    protected $rules = [
        'nome' => 'required|min:3',
        'estado' => 'required',
        'status' => 'required|in:ativo,inativo'
    ];

    public function render()
    {
        $cidades = Cidade::where('nome', 'like', '%' . $this->search . '%')
            ->orWhere('estado', 'like', '%' . $this->search . '%')
            ->paginate(10);

        return view('livewire.admin.enercon.cidade.cidade-component', compact('cidades'));
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
        $this->cidadeId = null;
        $this->nome = '';
        $this->estado = '';
        $this->status = 'ativo';
    }

    public function store()
    {
        $this->validate();

        Cidade::updateOrCreate(['id' => $this->cidadeId], [
            'nome' => $this->nome,
            'estado' => $this->estado,
            'status' => $this->status,
        ]);

        session()->flash('message',
            $this->cidadeId ? 'Cidade atualizada com sucesso.' : 'Cidade criada com sucesso.');

        $this->closeModal();
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $cidade = Cidade::findOrFail($id);
        $this->cidadeId = $id;
        $this->nome = $cidade->nome;
        $this->estado = $cidade->estado;
        $this->status = $cidade->status;

        $this->openModal();
    }

    public function view($id)
    {
        $cidade = Cidade::findOrFail($id);
        $this->cidadeId = $id;
        $this->nome = $cidade->nome;
        $this->estado = $cidade->estado;
        $this->status = $cidade->status;

        $this->isOpen = true;
        $this->isView = true;
    }

    public function delete($id)
    {
        Cidade::find($id)->delete();
        session()->flash('message', 'Cidade deletada com sucesso.');
    }
}
