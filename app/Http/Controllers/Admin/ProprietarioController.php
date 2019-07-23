<?php

namespace App\Http\Controllers\Admin;

use App\Proprietario;
use App\Http\Controllers\Controller;

class ProprietarioController extends Controller
{
    /**
     * Display a list of Proprietarios.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proprietarios = Proprietario::getList();

        return view('admin.proprietarios.index', compact('proprietarios'));
    }

    /**
     * Show the form for creating a new Proprietario
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $proprietarioOptions = Proprietario::$proprietarioOptions;

        return view('admin.proprietarios.add', compact('proprietarioOptions'));
    }

    /**
     * Save new Proprietario
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store()
    {
        $validatedData = request()->validate(Proprietario::validationRules());

        $proprietario = Proprietario::create($validatedData);

        return redirect()->route('admin.proprietarios.index')->with([
            'type' => 'success',
            'message' => 'Proprietario added'
        ]);
    }

    /**
     * Show the form for editing the specified Proprietario
     *
     * @param \App\Proprietario $proprietario
     * @return \Illuminate\Http\Response
     */
    public function edit(Proprietario $proprietario)
    {
        $proprietarioOptions = Proprietario::$proprietarioOptions;

        return view('admin.proprietarios.edit', compact('proprietario', 'proprietarioOptions'));
    }

    /**
     * Update the Proprietario
     *
     * @param \App\Proprietario $proprietario
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Proprietario $proprietario)
    {
        $validatedData = request()->validate(
            Proprietario::validationRules($proprietario->id)
        );

        $proprietario->update($validatedData);

        return redirect()->route('admin.proprietarios.index')->with([
            'type' => 'success',
            'message' => 'Proprietario Updated'
        ]);
    }

    /**
     * Delete the Proprietario
     *
     * @param \App\Proprietario $proprietario
     * @return void
     */
    public function destroy(Proprietario $proprietario)
    {
        if ($proprietario->requisicaos()->count()) {
            return redirect()->route('admin.proprietarios.index')->with([
                'type' => 'error',
                'message' => 'This record cannot be deleted as there are relationship dependencies.'
            ]);
        }

        $proprietario->delete();

        return redirect()->route('admin.proprietarios.index')->with([
            'type' => 'success',
            'message' => 'Proprietario deleted successfully'
        ]);
    }
}
