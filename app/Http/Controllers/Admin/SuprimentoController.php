<?php

namespace App\Http\Controllers\Admin;

use App\Suprimento;
use App\Http\Controllers\Controller;

class SuprimentoController extends Controller
{
    /**
     * Display a list of Suprimentos.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suprimentos = Suprimento::getList();

        return view('admin.suprimentos.index', compact('suprimentos'));
    }

    /**
     * Show the form for creating a new Suprimento
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipoOptions = Suprimento::$tipoOptions;

        $referenciaOptions = Suprimento::$referenciaOptions;

        return view('admin.suprimentos.add', compact('tipoOptions', 'referenciaOptions'));
    }

    /**
     * Save new Suprimento
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store()
    {
        $validatedData = request()->validate(Suprimento::validationRules());

        $suprimento = Suprimento::create($validatedData);

        return redirect()->route('admin.suprimentos.index')->with([
            'type' => 'success',
            'message' => 'Suprimento added'
        ]);
    }

    /**
     * Show the form for editing the specified Suprimento
     *
     * @param \App\Suprimento $suprimento
     * @return \Illuminate\Http\Response
     */
    public function edit(Suprimento $suprimento)
    {
        $tipoOptions = Suprimento::$tipoOptions;

        $referenciaOptions = Suprimento::$referenciaOptions;

        return view('admin.suprimentos.edit', compact('suprimento', 'tipoOptions', 'referenciaOptions'));
    }

    /**
     * Update the Suprimento
     *
     * @param \App\Suprimento $suprimento
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Suprimento $suprimento)
    {
        $validatedData = request()->validate(
            Suprimento::validationRules($suprimento->id)
        );

        $suprimento->update($validatedData);

        return redirect()->route('admin.suprimentos.index')->with([
            'type' => 'success',
            'message' => 'Suprimento Updated'
        ]);
    }

    /**
     * Delete the Suprimento
     *
     * @param \App\Suprimento $suprimento
     * @return void
     */
    public function destroy(Suprimento $suprimento)
    {
        if ($suprimento->impressoras()->count()) {
            return redirect()->route('admin.suprimentos.index')->with([
                'type' => 'error',
                'message' => 'This record cannot be deleted as there are relationship dependencies.'
            ]);
        }

        $suprimento->delete();

        return redirect()->route('admin.suprimentos.index')->with([
            'type' => 'success',
            'message' => 'Suprimento deleted successfully'
        ]);
    }
}
