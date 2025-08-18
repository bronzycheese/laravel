<?php

namespace App\Livewire\Admin\Enercon\Protocolo;
use Livewire\WithPagination;
use App\Models\Admin\Enercon\Protocolo;
use Livewire\Component;

class ProtocoloComponent extends Component
{
     use WithPagination;

    public $protocoloId;
    public $deleteId = '0';
    public $nome;
    public $descricao;
    public $tipo = 'solicitacao';
    public $endereco;
    public $cidade;
    public $estado;
    public $status = 'pendente';
    public $search = '';
    public $isOpen = false;
    public $isView = false;

    protected $paginationTheme = 'bootstrap';

    protected $rules = [
        'nome' => 'required|min:3',
        'descricao' => 'required|min:5',
        'tipo' => 'required|in:solicitacao,reclamacao,sugestao',
        'endereco' => 'required',
        'cidade' => 'required',
        'estado' => 'required',
        'status' => 'required|in:pendente,em_andamento,concluido,cancelado'
    ];

    public function render()
    {
        $protocolos = Protocolo::where('nome', 'like', '%' . $this->search . '%')
            ->orWhere('descricao', 'like', '%' . $this->search . '%')
            ->paginate(10);

        return view('livewire.admin.enercon.protocolo.protocolo-component', compact('protocolos'));
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
        $this->protocoloId = null;
        $this->nome = '';
        $this->descricao = '';
        $this->tipo = 'solicitacao';
        $this->endereco = '';
        $this->cidade = '';
        $this->estado = '';
        $this->status = 'pendente';
    }

    public function store()
    {
        $this->validate();

        Protocolo::updateOrCreate(['id' => $this->protocoloId], [
            'nome' => $this->nome,
            'descricao' => $this->descricao,
            'tipo' => $this->tipo,
            'endereco' => $this->endereco,
            'cidade' => $this->cidade,
            'estado' => $this->estado,
            'status' => $this->status,
        ]);

        session()->flash('message',
            $this->protocoloId ? 'Protocolo atualizado com sucesso.' : 'Protocolo criado com sucesso.');

        $this->closeModal();
        $this->resetInputFields();
    }

    public function edit($id)
    {
        dd($id);
        $protocolo = Protocolo::findOrFail($id);
        $this->protocoloId = $id;
        $this->nome = $protocolo->nome;
        $this->descricao = $protocolo->descricao;
        $this->tipo = $protocolo->tipo;
        $this->endereco = $protocolo->endereco;
        $this->cidade = $protocolo->cidade;
        $this->estado = $protocolo->estado;
        $this->status = $protocolo->status;

        $this->openModal();
    }

    public function view($id)
    {
        $protocolo = Protocolo::findOrFail($id);
        $this->protocoloId = $id;
        $this->nome = $protocolo->nome;
        $this->descricao = $protocolo->descricao;
        $this->tipo = $protocolo->tipo;
        $this->endereco = $protocolo->endereco;
        $this->cidade = $protocolo->cidade;
        $this->estado = $protocolo->estado;
        $this->status = $protocolo->status;

        $this->isOpen = true;
        $this->isView = true;
    }
    public function delete($id)
    {
        $protocolo = Protocolo::findOrFail($id);
        $this->deleteId = $protocolo->id;
    }
    public function destroy($id)
    {
        //dd($id);

        $protocolo = Protocolo::find($id);
        $protocolo ? $protocolo->delete() : null;
        session()->flash('message', 'Protocolo deletado com sucesso.');
         $this->deleteId = 0;
    }
}
