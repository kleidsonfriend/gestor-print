<?php

namespace App\Http\Controllers\Admin;

use App\Impressora;
use App\Suprimento;
use App\Http\Controllers\Controller;

class ImpressoraController extends Controller
{
    /**
     * Display a list of Impressoras.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $impressoras = Impressora::getList();

        return view('admin.impressoras.index', compact('impressoras'));
    }

    /**
     * Show the form for creating a new Impressora
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $suprimentos = Suprimento::all();

        $impressoraOptions = Impressora::$impressoraOptions;

        return view('admin.impressoras.add', compact('impressoraOptions', 'suprimentos'));
    }

    /**
     * Save new Impressora
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store()
    {
        $validatedData = request()->validate(Impressora::validationRules());

        $impressora = Impressora::create($validatedData);

        return redirect()->route('admin.impressoras.index')->with([
            'type' => 'success',
            'message' => 'Impressora added'
        ]);
    }

    /**
     * Show the form for editing the specified Impressora
     *
     * @param \App\Impressora $impressora
     * @return \Illuminate\Http\Response
     */
    public function edit(Impressora $impressora)
    {
        $suprimentos = Suprimento::all();

        $impressoraOptions = Impressora::$impressoraOptions;

        return view('admin.impressoras.edit', compact('impressora', 'impressoraOptions', 'suprimentos'));
    }

    /**
     * Update the Impressora
     *
     * @param \App\Impressora $impressora
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Impressora $impressora)
    {
        $validatedData = request()->validate(
            Impressora::validationRules($impressora->id)
        );

        $impressora->update($validatedData);

        return redirect()->route('admin.impressoras.index')->with([
            'type' => 'success',
            'message' => 'Impressora Updated'
        ]);
    }

    /**
     * Delete the Impressora
     *
     * @param \App\Impressora $impressora
     * @return void
     */
    public function destroy(Impressora $impressora)
    {
        if ($impressora->contagems()->count()) {
            return redirect()->route('admin.impressoras.index')->with([
                'type' => 'error',
                'message' => 'This record cannot be deleted as there are relationship dependencies.'
            ]);
        }

        $impressora->delete();

        return redirect()->route('admin.impressoras.index')->with([
            'type' => 'success',
            'message' => 'Impressora deleted successfully'
        ]);
    }
}
