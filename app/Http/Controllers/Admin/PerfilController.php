<?php

namespace App\Http\Controllers\Admin;

use App\Perfil;
use App\Http\Controllers\Controller;

class PerfilController extends Controller
{
    /**
     * Display a list of Perfils.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perfils = Perfil::getList();

        return view('admin.perfils.index', compact('perfils'));
    }

    /**
     * Show the form for creating a new Perfil
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $perfilOptions = Perfil::$perfilOptions;

        return view('admin.perfils.add', compact('perfilOptions'));
    }

    /**
     * Save new Perfil
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store()
    {
        $validatedData = request()->validate(Perfil::validationRules());

        $perfil = Perfil::create($validatedData);

        return redirect()->route('admin.perfils.index')->with([
            'type' => 'success',
            'message' => 'Perfil added'
        ]);
    }

    /**
     * Show the form for editing the specified Perfil
     *
     * @param \App\Perfil $perfil
     * @return \Illuminate\Http\Response
     */
    public function edit(Perfil $perfil)
    {
        $perfilOptions = Perfil::$perfilOptions;

        return view('admin.perfils.edit', compact('perfil', 'perfilOptions'));
    }

    /**
     * Update the Perfil
     *
     * @param \App\Perfil $perfil
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Perfil $perfil)
    {
        $validatedData = request()->validate(
            Perfil::validationRules($perfil->id)
        );

        $perfil->update($validatedData);

        return redirect()->route('admin.perfils.index')->with([
            'type' => 'success',
            'message' => 'Perfil Updated'
        ]);
    }

    /**
     * Delete the Perfil
     *
     * @param \App\Perfil $perfil
     * @return void
     */
    public function destroy(Perfil $perfil)
    {
        if ($perfil->usuarios()->count()) {
            return redirect()->route('admin.perfils.index')->with([
                'type' => 'error',
                'message' => 'This record cannot be deleted as there are relationship dependencies.'
            ]);
        }

        $perfil->delete();

        return redirect()->route('admin.perfils.index')->with([
            'type' => 'success',
            'message' => 'Perfil deleted successfully'
        ]);
    }
}
