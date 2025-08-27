<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use App\Http\Controllers\UsuarioController;
use App\Livewire\MunicipioComponent;
Route::get('/dashboard', function () {
    return view('admin.enercon.app.dashboard.index');
});
Route::get('/situacoes', function () {
    return view('situacoes.index');
})->name('situacoes');
Route::get('/fases', function () {
    return view('fases.index');
})->name('fases');
Route::get('/empresas', function () {
    return view('empresas.index');
})->name('empresas');
Route::get('/municipios', function () {
    return view('municipios.index');
})->name('municipios');
Route::get('/', function () {
    return view('welcome');
})->name('home');
Route::get('/usuarios', function () {
    return view('usuarios.index');
})->name('usuario');
Route::get('/protocolos', function () {
    return view('protocolos.index');
})->name('protocolo');
Route::get('/cidades', function(){
    return view('cidades.index');
})->name('cidade');
Route::get('/servicos', function () {
    return view('servico.index');
})->name('servico');
//Route::get('/usuarios', [UsuarioController::class, 'index'])->name('usuarios.index');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__.'/auth.php';


Route::get('/enercon', function () {
    // Verifica se o usuário está autenticado
    if (auth()->check()) {
        // return view('admin.cubo.contrato.wizard.index_contrato');
        return view('admin.app.layouts.app');
    }

    return view('livewire.auth.login'); // Usuário não logado

});


Route::get('/', function () {
    return view('admin.app.layouts.app');
})->name('enercon');
