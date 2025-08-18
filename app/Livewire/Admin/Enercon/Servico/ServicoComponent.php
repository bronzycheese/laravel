<?php

namespace App\Livewire\Admin\Enercon\Servico;
use Livewire\WithPagination;
use App\Models\Admin\Enercon\Servico;
use Livewire\Component;

class ServicoComponent extends Component
{
     use WithPagination;

    public $data = [];

    public $servicoId;
    public $deleteId = '0';
    public $search = '';
    public $isOpen = false;
    public $isView = false;

    protected $paginationTheme = 'bootstrap';

    public function rules(): array
{
    return [
        'data.cidade_id' => ['required', 'exists:cidades,id'],
        'data.nome' => ['required', 'string', 'max:255'],
        'data.descricao' => ['nullable', 'string'],
        'data.cor' => ['nullable', 'regex:/^#([A-Fa-f0-9]{6})$/'],
        'data.icone' => ['nullable', 'string'],
        'data.ordem' => ['nullable', 'integer', 'min:1'],
        'data.telefone' => ['nullable', 'string', 'max:20'],
        'data.ativo' => ['boolean'],
        'data.chamada' => ['boolean'],
    ];
}
    public function mount()
    {
        $this->data['cor']='#000000';
        $this->data['icone']='tree';
    }

    public function render()
    {
        $servicos = Servico::paginate(10);
        return view('livewire.admin.enercon.servico.servico-component', compact('servicos'));
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
        $this->servicoId = null;
       $this->data=[];
    }

    public function store()
    {
        $this->validate();
        //dd($this->data);

        Servico::updateOrCreate(
            ['id' => $this->servicoId],
            $this->data
        );

        session()->flash('message',
            $this->servicoId ? 'Servico atualizado com sucesso.' : 'Servico criado com sucesso.');

        $this->closeModal();
        $this->resetInputFields();
    }

    public function edit($id)
    {
        //dd($id);
        $servico = Servico::findOrFail($id);
        $this->servicoId = $id;
        $this->data = $servico->toArray();
        $this->openModal();
    }

    public function view($id)
    {
        $servico = Servico::findOrFail($id);
        $this->servicoId = $id;
        $this->nome = $servico->nome;
        $this->descricao = $servico->descricao;
        $this->tipo = $servico->tipo;
        $this->endereco = $servico->endereco;
        $this->cidade = $servico->cidade;
        $this->estado = $servico->estado;
        $this->status = $servico->status;

        $this->isOpen = true;
        $this->isView = true;
    }
    public function delete($id)
    {
        $servico = Servico::findOrFail($id);
        $this->deleteId = $servico->id;
    }
    public function destroy($id)
    {
        //dd($id);

        $servico = Servico::find($id);
        $servico ? $servico->delete() : null;
        session()->flash('message', 'Servico deletado com sucesso.');
         $this->deleteId = 0;
    }
}
