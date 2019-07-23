<?php

namespace App\Http\Controllers\Admin;

use App\Setor;
use App\Usuario;
use App\Http\Controllers\Controller;

class SetorController extends Controller
{
    /**
     * Display a list of Setors.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $setors = Setor::getList();

        return view('admin.setors.index', compact('setors'));
    }

    /**
     * Show the form for creating a new Setor
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $usuarios = Usuario::all();

        $setorOptions = Setor::$setorOptions;

        return view('admin.setors.add', compact('setorOptions', 'usuarios'));
    }

    /**
     * Save new Setor
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store()
    {
        $validatedData = request()->validate(Setor::validationRules());

        $setor = Setor::create($validatedData);

        return redirect()->route('admin.setors.index')->with([
            'type' => 'success',
            'message' => 'Setor added'
        ]);
    }

    /**
     * Show the form for editing the specified Setor
     *
     * @param \App\Setor $setor
     * @return \Illuminate\Http\Response
     */
    public function edit(Setor $setor)
    {
        $usuarios = Usuario::all();

        $setorOptions = Setor::$setorOptions;

        return view('admin.setors.edit', compact('setor', 'setorOptions', 'usuarios'));
    }

    /**
     * Update the Setor
     *
     * @param \App\Setor $setor
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Setor $setor)
    {
        $validatedData = request()->validate(
            Setor::validationRules($setor->id)
        );

        $setor->update($validatedData);

        return redirect()->route('admin.setors.index')->with([
            'type' => 'success',
            'message' => 'Setor Updated'
        ]);
    }

    /**
     * Delete the Setor
     *
     * @param \App\Setor $setor
     * @return void
     */
    public function destroy(Setor $setor)
    {
        if ($setor->requisicaos()->count()) {
            return redirect()->route('admin.setors.index')->with([
                'type' => 'error',
                'message' => 'This record cannot be deleted as there are relationship dependencies.'
            ]);
        }

        $setor->delete();

        return redirect()->route('admin.setors.index')->with([
            'type' => 'success',
            'message' => 'Setor deleted successfully'
        ]);
    }
}
