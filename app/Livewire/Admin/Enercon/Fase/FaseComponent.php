<?php

namespace App\Livewire\Admin\Enercon\Fase;
use Livewire\WithPagination;
use App\Models\Admin\Enercon\Fase;
use Livewire\Component;

class FaseComponent extends Component
{
     use WithPagination;

    public $faseId;
    public $deleteId = '0';
    public $obraId;
    public $nome;
    public $numero;
    public $search = '';
    public $isOpen = false;
    public $isView = false;

    protected $paginationTheme = 'bootstrap';

    protected $rules = [
        'nome' => 'required|min:3',
        'numero' => 'required|min:1'
    ];

    public function render()
    {
        $fases = Fase::where('nome', 'like', '%' . $this->search . '%')
            ->orWhere('numero', 'like', '%' . $this->search . '%')
            ->paginate(10);

        return view('livewire.admin.enercon.fase.fase-component', compact('fases'));
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
        $this->faseId = null;
        $this->nome = '';
        $this->numero = '';
    }

    public function store()
    {
        $this->validate();

        Fase::updateOrCreate(['id' => $this->faseId], [
            'nome' => $this->nome,
            'numero' => $this->numero,
        ]);

        session()->flash('message',
            $this->faseId ? 'Fase atualizada com sucesso.' : 'Fase criada com sucesso.');

        $this->closeModal();
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $fase = Fase::findOrFail($id);
        $this->faseId = $id;
        $this->nome = $fase->nome;
        $this->numero = $numero->numero;

        $this->openModal();
    }

    public function view($id)
    {
        $fase = Fase::findOrFail($id);
        $this->faseId = $id;
        $this->nome = $fase->nome;
        $this->numero = $fase->descricao;

        $this->isOpen = true;
        $this->isView = true;
    }
    public function delete($id)
    {
        $fase = Fase::findOrFail($id);
        $this->deleteId = $fase->id;
    }
    public function destroy($id)
    {
        //dd($id);

        $fase = Fase::find($id);
        $fase ? $fase->delete() : null;
        session()->flash('message', 'Fase deletada com sucesso.');
         $this->deleteId = 0;
    }
}
