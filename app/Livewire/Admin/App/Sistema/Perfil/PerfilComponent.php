<?php

namespace App\Livewire\Admin\App\Sistema\Perfil;

use Livewire\Component;
use App\Models\User;
use App\Models\Admin\Sesau\Auth\Profissional;
use Illuminate\Support\Facades\Auth;

class PerfilComponent extends Component
{
    public $openResetarSenha = false;
    public $data = [];
    public $form = [];

    public function mount()
    {
        $this->data['nome'] = Auth::user()->nome;
        $this->data['email'] = Auth::user()->email;
    }


    public function password()
    {
        $this->validate([
            'form.password' => 'required|confirmed|min:8',
         ]);

        try{
            User::find(Auth::user()->id)->fill([
                'password' =>   bcrypt($this->form['password']) ,
            ])->save();

            session()->flash('message', 'Password atualizado com sucesso!!');

        }catch(\Exception $e){
            session()->flash('error','Algo deu errado durante a atualização!!');
            $this->close();
        }
    }

    public function close()
    {
        $this->resetFields();
    }

    private function resetFields()
    {
        $this->resetErrorBag();
        $this->resetValidation();
        $this->form = [];
        $this->openResetarSenha = false;
    }

    public function resetarSenha()
    {        
        $this->openResetarSenha = !$this->openResetarSenha;
    }

    public function render()
    {
        return view('livewire.admin.app.sistema.perfil.perfil-component');
    }
}
