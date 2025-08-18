<?php

namespace App\Livewire\Admin\Enercon\Usuario;

use Livewire\Component;
use App\Models\Admin\Enercon\Usuario;
use Livewire\WithPagination;


class UsuarioComponent extends Component
{
     use WithPagination;

    public $usuarioId;
    public $nome;
    public $email;
    public $telefone;
    public $endereco;
    public $cidade;
    public $estado;
    public $status = 'ativo';
    public $search = '';
    public $isOpen = false;
    public $isView = false;

    protected $paginationTheme = 'bootstrap';

    protected $rules = [
        'nome' => 'required|min:3',
        'email' => 'required|email|unique:usuarios,email',
        'telefone' => 'required',
        'endereco' => 'required',
        'cidade' => 'required',
        'estado' => 'required',
        'status' => 'required|in:ativo,inativo'
    ];

    public function render()
    {
        $usuarios = Usuario::where('nome', 'like', '%' . $this->search . '%')
            ->orWhere('email', 'like', '%' . $this->search . '%')
            ->paginate(10);

        return view('livewire.admin.enercon.usuario.usuario-component', compact('usuarios'));
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
        $this->usuarioId = null;
        $this->nome = '';
        $this->email = '';
        $this->telefone = '';
        $this->endereco = '';
        $this->cidade = '';
        $this->estado = '';
        $this->status = 'ativo';
    }

    public function store()
    {
        $this->validate();

        Usuario::updateOrCreate(['id' => $this->usuarioId], [
            'nome' => $this->nome,
            'email' => $this->email,
            'telefone' => $this->telefone,
            'endereco' => $this->endereco,
            'cidade' => $this->cidade,
            'estado' => $this->estado,
            'status' => $this->status,
        ]);

        session()->flash('message',
            $this->usuarioId ? 'Usuário atualizado com sucesso.' : 'Usuário criado com sucesso.');

        $this->closeModal();
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $usuario = Usuario::findOrFail($id);
        $this->usuarioId = $id;
        $this->nome = $usuario->nome;
        $this->email = $usuario->email;
        $this->telefone = $usuario->telefone;
        $this->endereco = $usuario->endereco;
        $this->cidade = $usuario->cidade;
        $this->estado = $usuario->estado;
        $this->status = $usuario->status;

        $this->openModal();
    }

    public function view($id)
    {
        $usuario = Usuario::findOrFail($id);
        $this->usuarioId = $id;
        $this->nome = $usuario->nome;
        $this->email = $usuario->email;
        $this->telefone = $usuario->telefone;
        $this->endereco = $usuario->endereco;
        $this->cidade = $usuario->cidade;
        $this->estado = $usuario->estado;
        $this->status = $usuario->status;

        $this->isOpen = true;
        $this->isView = true;
    }

    public function delete($id)
    {
        Usuario::find($id)->delete();
        session()->flash('message', 'Usuário deletado com sucesso.');
    }

    protected function rules()
    {
        $rules = [
            'nome' => 'required|min:3',
            'email' => 'required|email',
            'telefone' => 'required',
            'endereco' => 'required',
            'cidade' => 'required',
            'estado' => 'required',
            'status' => 'required|in:ativo,inativo'
        ];

        if ($this->usuarioId) {
            $rules['email'] = 'required|email|unique:usuarios,email,' . $this->usuarioId;
        } else {
            $rules['email'] = 'required|email|unique:usuarios,email';
        }

        return $rules;
    }
}
