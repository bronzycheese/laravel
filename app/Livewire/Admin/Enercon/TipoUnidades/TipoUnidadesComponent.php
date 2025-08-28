<?php

namespace App\Livewire\Admin\Enercon\TipoUnidades;

use Livewire\Component;
use App\Models\Admin\Enercon\TipoUnidades;
use Livewire\WithPagination;


class TipoUnidadesComponent extends Component
{
     use WithPagination;

    public $tipoUnidadesId;
    public $nome;
    public $search = '';
    public $isOpen = false;
    public $isView = false;

    protected $paginationTheme = 'bootstrap';

    protected $rules = [
        'nome' => 'required|min:1',
    ];

    public function render()
    {
        $cidades = TipoUnidades::where('nome', 'like', '%' . $this->search . '%')
            ->paginate(10);

        return view('livewire.admin.enercon.tipoUnidades.tipoUnidades-component', compact('tiposUnidades'));
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
        $this->tipoUnidadesId = null;
        $this->nome = '';
    }

    public function store()
    {
        $this->validate();

        TipoUnidades::updateOrCreate(['id' => $this->tipoUnidadesId], [
            'nome' => $this->nome,
        ]);

        session()->flash('message',
            $this->tipoUnidadesId ? 'unidade atualizada com sucesso.' : 'unidade criada com sucesso.');

        $this->closeModal();
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $tipoUnidades = TipoUnidades::findOrFail($id);
        $this->tipoUnidadesId = $id;
        $this->nome = $tipoUnidades->nome;

        $this->openModal();
    }

    public function view($id)
    {
        $tipoUnidades = TipoUnidades::findOrFail($id);
        $this->tipoUnidadesId = $id;
        $this->nome = $tipoUnidades->nome;

        $this->isOpen = true;
        $this->isView = true;
    }

    public function delete($id)
    {
        TipoUnidades::find($id)->delete();
        session()->flash('message', 'Unidade deletada com sucesso.');
    }
}
