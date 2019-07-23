<?php

namespace App\Http\Controllers\Admin;

use App\Usuario;
use App\Perfil;
use App\Requisicao;
use App\Http\Controllers\Controller;

class UsuarioController extends Controller
{
    /**
     * Display a list of Usuarios.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = Usuario::getList();

        return view('admin.usuarios.index', compact('usuarios'));
    }

    /**
     * Show the form for creating a new Usuario
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $perfils = Perfil::all();
        $requisicaos = Requisicao::all();

        return view('admin.usuarios.add', compact('perfils', 'requisicaos'));
    }

    /**
     * Save new Usuario
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store()
    {
        $validatedData = request()->validate(Usuario::validationRules());

        $validatedData['senha'] = bcrypt($validatedData['senha']);
        unset($validatedData['requisicaos']);
        $usuario = Usuario::create($validatedData);

        $usuario->requisicaos()->sync(request('requisicaos'));

        return redirect()->route('admin.usuarios.index')->with([
            'type' => 'success',
            'message' => 'Usuario added'
        ]);
    }

    /**
     * Show the form for editing the specified Usuario
     *
     * @param \App\Usuario $usuario
     * @return \Illuminate\Http\Response
     */
    public function edit(Usuario $usuario)
    {
        $perfils = Perfil::all();
        $requisicaos = Requisicao::all();

        $usuario->requisicaos = $usuario->requisicaos->pluck('id')->toArray();

        return view('admin.usuarios.edit', compact('usuario', 'perfils', 'requisicaos'));
    }

    /**
     * Update the Usuario
     *
     * @param \App\Usuario $usuario
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Usuario $usuario)
    {
        $validatedData = request()->validate(
            Usuario::validationRules($usuario->id)
        );

        $validatedData['senha'] = bcrypt($validatedData['senha']);
        unset($validatedData['requisicaos']);
        $usuario->update($validatedData);

        $usuario->requisicaos()->sync(request('requisicaos'));

        return redirect()->route('admin.usuarios.index')->with([
            'type' => 'success',
            'message' => 'Usuario Updated'
        ]);
    }

    /**
     * Delete the Usuario
     *
     * @param \App\Usuario $usuario
     * @return void
     */
    public function destroy(Usuario $usuario)
    {
        if ($usuario->setors()->count() || $usuario->requisicaos()->count()) {
            return redirect()->route('admin.usuarios.index')->with([
                'type' => 'error',
                'message' => 'This record cannot be deleted as there are relationship dependencies.'
            ]);
        }

        $usuario->delete();

        return redirect()->route('admin.usuarios.index')->with([
            'type' => 'success',
            'message' => 'Usuario deleted successfully'
        ]);
    }
}
