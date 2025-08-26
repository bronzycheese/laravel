<?php

namespace App\Livewire\Admin\App\Cidade;

use Livewire\Component;

use Illuminate\Support\Str;
use App\Models\Admin\Enercon\Obra\Cidade;
use App\Models\User;
use Livewire\WithPagination;

class CidadeComponent extends Component
{
    use WithPagination;   
    protected $paginationTheme = 'bootstrap';

    public $form = [];
    public $editMode = false; // <-- aqui declaramos a variável
    public $cidadeId;

    public $search = '';
    public $statusFilter = '';

    protected $rules = [
        'form.nome' => 'required|string|max:255',
        // 'form.slug' => 'nullable|string|max:255|unique:cidades,slug',
        'form.estado' => 'required|string|size:2',
        'form.nome_banco_dados' => 'nullable|string|max:255',
        'form.brasao' => 'nullable|url|max:255',
        'form.logo_prefeitura' => 'nullable|url|max:255',
        'form.cor_principal' => 'nullable|string|regex:/^#[0-9A-Fa-f]{6}$/',
        'form.telefone_prefeitura' => 'nullable|string|max:20',
        'form.email_ouvidoria' => 'nullable|email|max:255',
        'form.site' => 'nullable|url|max:255',
        'form.status' => 'required|in:ativo,inativo',
    ];

    public function create()
    {
        $this->resetForm();
        $this->editMode = false;
    }

    public function edit($id)
    {
        $cidade = Cidade::findOrFail($id);
        $this->cidadeId = $cidade->id;
        $this->form = $cidade->toArray();
        $this->editMode = true;
    }

    public function store()
    {
        $this->validate();

        Cidade::create($this->form);

        $this->resetForm();
        
    }

    public function update()
    {
        $this->validate();
        
        $cidade = Cidade::findOrFail($this->cidadeId);
        $cidade->update($this->form);

        $this->resetForm();
      
    }

    public function resetForm()
    {
        $this->form = [];
        $this->editMode = false;
        $this->cidadeId = null;
    }

    public function render()
    {
        $cidades = Cidade::query()
            ->when($this->search, fn($query) =>
                $query->where('nome', 'like', "%{$this->search}%")
            )
            ->when($this->statusFilter, fn($query) =>
                $query->where('status', $this->statusFilter)
            )
            ->orderBy('nome')
            ->paginate(10);
    
        return view('livewire.admin.app.cidade.cidade-component', [
            'cidades' => $cidades
        ]);
    }


}
