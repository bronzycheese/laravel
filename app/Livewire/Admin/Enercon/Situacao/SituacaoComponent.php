<?php

namespace App\Livewire\Admin\Enercon\Situacao;

use Livewire\Component;
use App\Models\Admin\Enercon\Situacao;
use Livewire\WithPagination;


class SituacaoComponent extends Component
{
     use WithPagination;

    public $situacaoId;
    public $nome;
    public $status = 'ativo';
    public $search = '';
    public $isOpen = false;
    public $isView = false;

    protected $paginationTheme = 'bootstrap';

    protected $rules = [
        'nome' => 'required|min:3',
        'status' => 'required|in:ativo,inativo'
    ];

    public function render()
    {
        $situacoes = Situacoes::where('nome', 'like', '%' . $this->search . '%')
            ->paginate(10);

        return view('livewire.admin.enercon.situacao.situacao-component', compact('situacoes'));
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
        $this->situacaoId = null;
        $this->nome = '';
        $this->status = 'ativo';
    }

    public function store()
    {
        $this->validate();

        Situacao::updateOrCreate(['id' => $this->situacaoId], [
            'nome' => $this->nome,
            'status' => $this->status,
        ]);

        session()->flash('message',
            $this->situacaoId ? 'Situacao atualizada com sucesso.' : 'Situacao criada com sucesso.');

        $this->closeModal();
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $situacao = Situacao::findOrFail($id);
        $this->situacaoId = $id;
        $this->nome = $situacao->nome;
        $this->status = $situacao->status;

        $this->openModal();
    }

    public function view($id)
    {
        $situacao = Situacao::findOrFail($id);
        $this->situacaoId = $id;
        $this->nome = $situacao->nome;
        $this->status = $situacao->status;

        $this->isOpen = true;
        $this->isView = true;
    }

    public function delete($id)
    {
        Situacao::find($id)->delete();
        session()->flash('message', 'Situacao deletada com sucesso.');
    }
}
