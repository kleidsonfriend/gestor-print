<?php

namespace App\Http\Controllers\Admin;

use App\Contagem;
use App\Impressora;
use App\Requisicao;
use App\Http\Controllers\Controller;

class ContagemController extends Controller
{
    /**
     * Display a list of Contagems.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contagems = Contagem::getList();

        return view('admin.contagems.index', compact('contagems'));
    }

    /**
     * Show the form for creating a new Contagem
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $impressoras = Impressora::all();
        $requisicaos = Requisicao::all();

        return view('admin.contagems.add', compact('impressoras', 'requisicaos'));
    }

    /**
     * Save new Contagem
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store()
    {
        $validatedData = request()->validate(Contagem::validationRules());

        $contagem = Contagem::create($validatedData);

        return redirect()->route('admin.contagems.index')->with([
            'type' => 'success',
            'message' => 'Contagem added'
        ]);
    }

    /**
     * Show the form for editing the specified Contagem
     *
     * @param \App\Contagem $contagem
     * @return \Illuminate\Http\Response
     */
    public function edit(Contagem $contagem)
    {
        $impressoras = Impressora::all();
        $requisicaos = Requisicao::all();

        return view('admin.contagems.edit', compact('contagem', 'impressoras', 'requisicaos'));
    }

    /**
     * Update the Contagem
     *
     * @param \App\Contagem $contagem
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Contagem $contagem)
    {
        $validatedData = request()->validate(
            Contagem::validationRules($contagem->id)
        );

        $contagem->update($validatedData);

        return redirect()->route('admin.contagems.index')->with([
            'type' => 'success',
            'message' => 'Contagem Updated'
        ]);
    }

    /**
     * Delete the Contagem
     *
     * @param \App\Contagem $contagem
     * @return void
     */
    public function destroy(Contagem $contagem)
    {
        $contagem->delete();

        return redirect()->route('admin.contagems.index')->with([
            'type' => 'success',
            'message' => 'Contagem deleted successfully'
        ]);
    }
}
