<?php

namespace App\Livewire\Admin\App\Empresa;

use Livewire\Component;

use App\Models\Admin\Enercon\Obra\Empresa;
use App\Models\User;
use Livewire\WithPagination;

class EmpresaComponent extends Component
{
    use WithPagination;   
    protected $paginationTheme = 'bootstrap';

    public $form = [];
    public $editMode = false; // <-- aqui declaramos a variável
    public $itemId;

    public $search = '';
    public $statusFilter = '';

    protected $rules = [
        'form.nome' => 'required|string|max:255',
        'form.razao_social' => 'nullable|string|max:255',
        'form.cnpj' => 'nullable|string|size:18',
        'form.inscricao_estadual' => 'nullable|string|max:50',
        'form.endereco' => 'nullable|string|max:255',
        'form.cidade' => 'nullable|string|max:255',
        'form.estado' => 'nullable|string|size:2',
        'form.cep' => 'nullable|string|regex:/^\d{5}-\d{3}$/',
        'form.telefone' => 'nullable|string|max:20',
        'form.email' => 'nullable|email|max:255',
        'form.status' => 'required|in:ativo,inativo',
    ];
    
    protected $messages = [
        'form.nome.required' => 'O nome da empresa é obrigatório.',
        'form.nome.string' => 'O nome da empresa deve ser um texto válido.',
        'form.nome.max' => 'O nome da empresa não pode ultrapassar 255 caracteres.',
    
        'form.razao_social.string' => 'A razão social deve ser um texto válido.',
        'form.razao_social.max' => 'A razão social não pode ultrapassar 255 caracteres.',
    
        'form.cnpj.size' => 'O CNPJ deve ter exatamente 18 caracteres (ex: 00.000.000/0000-00).',
        'form.cnpj.unique' => 'Este CNPJ já está cadastrado.',
    
        'form.inscricao_estadual.string' => 'A inscrição estadual deve ser um texto válido.',
        'form.inscricao_estadual.max' => 'A inscrição estadual não pode ultrapassar 50 caracteres.',
    
        'form.endereco.string' => 'O endereço deve ser um texto válido.',
        'form.endereco.max' => 'O endereço não pode ultrapassar 255 caracteres.',
    
        'form.cidade.string' => 'A cidade deve ser um texto válido.',
        'form.cidade.max' => 'A cidade não pode ultrapassar 255 caracteres.',
    
        'form.estado.string' => 'O estado deve ser um texto válido.',
        'form.estado.size' => 'O estado deve ter exatamente 2 caracteres (ex: MS, SP).',
    
        'form.cep.regex' => 'O CEP deve estar no formato 00000-000.',
    
        'form.telefone.string' => 'O telefone deve ser um texto válido.',
        'form.telefone.max' => 'O telefone não pode ultrapassar 20 caracteres.',
    
        'form.email.email' => 'O e-mail deve ser um endereço válido.',
        'form.email.max' => 'O e-mail não pode ultrapassar 255 caracteres.',
    
        'form.status.required' => 'O status é obrigatório.',
        'form.status.in' => 'O status deve ser "ativo" ou "inativo".',
    ];
    

    public function create()
    {
        $this->resetForm();
        $this->editMode = false;
    }

    public function edit($id)
    {
        $item = Empresa::findOrFail($id);
        $this->itemId = $item->id;
        $this->form = $item->toArray();
        $this->editMode = true;
    }

    public function store()
    {
        $this->validate();

        Empresa::create($this->form);

        $this->resetForm();
        
    }

    public function update()
    {
        $this->validate();

        $item = Empresa::findOrFail($this->itemId);
        $item->update($this->form);

        $this->resetForm();
      
    }

    public function resetForm()
    {
        $this->form = [];
        $this->editMode = false;
        $this->itemId = null;
    }


    public function render()
    {
        $empresas = Empresa::query()
            ->when($this->search, fn($query) =>
                $query->where('nome', 'like', "%{$this->search}%")
            )
            ->when($this->statusFilter, fn($query) =>
                $query->where('status', $this->statusFilter)
            )
            ->orderBy('nome')
            ->paginate(10);
    
        return view('livewire.admin.app.empresa.empresa-component', [
            'empresas' => $empresas
        ]);
    }



}
