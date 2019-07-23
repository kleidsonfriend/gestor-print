<?php

namespace App\Http\Controllers\Admin;

use App\Servico;
use App\Http\Controllers\Controller;

class ServicoController extends Controller
{
    /**
     * Display a list of Servicos.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $servicos = Servico::getList();

        return view('admin.servicos.index', compact('servicos'));
    }

    /**
     * Show the form for creating a new Servico
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $servicoOptions = Servico::$servicoOptions;

        return view('admin.servicos.add', compact('servicoOptions'));
    }

    /**
     * Save new Servico
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store()
    {
        $validatedData = request()->validate(Servico::validationRules());

        $servico = Servico::create($validatedData);

        return redirect()->route('admin.servicos.index')->with([
            'type' => 'success',
            'message' => 'Servico added'
        ]);
    }

    /**
     * Show the form for editing the specified Servico
     *
     * @param \App\Servico $servico
     * @return \Illuminate\Http\Response
     */
    public function edit(Servico $servico)
    {
        $servicoOptions = Servico::$servicoOptions;

        return view('admin.servicos.edit', compact('servico', 'servicoOptions'));
    }

    /**
     * Update the Servico
     *
     * @param \App\Servico $servico
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Servico $servico)
    {
        $validatedData = request()->validate(
            Servico::validationRules($servico->id)
        );

        $servico->update($validatedData);

        return redirect()->route('admin.servicos.index')->with([
            'type' => 'success',
            'message' => 'Servico Updated'
        ]);
    }

    /**
     * Delete the Servico
     *
     * @param \App\Servico $servico
     * @return void
     */
    public function destroy(Servico $servico)
    {
        if ($servico->requisicaos()->count()) {
            return redirect()->route('admin.servicos.index')->with([
                'type' => 'error',
                'message' => 'This record cannot be deleted as there are relationship dependencies.'
            ]);
        }

        $servico->delete();

        return redirect()->route('admin.servicos.index')->with([
            'type' => 'success',
            'message' => 'Servico deleted successfully'
        ]);
    }
}
