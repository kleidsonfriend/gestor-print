<?php

namespace App\Http\Controllers\Admin;

use App\Requisicao;
use App\Proprietario;
use App\Servico;
use App\Setor;
use App\Status;
use App\Http\Controllers\Controller;

class RequisicaoController extends Controller
{
    /**
     * Display a list of Requisicaos.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $requisicaos = Requisicao::getList();

        return view('admin.requisicaos.index', compact('requisicaos'));
    }

    /**
     * Show the form for creating a new Requisicao
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $proprietarios = Proprietario::all();
        $servicos = Servico::all();
        $setors = Setor::all();
        $statuses = Status::all();

        return view('admin.requisicaos.add', compact('proprietarios', 'servicos', 'setors', 'statuses'));
    }

    /**
     * Save new Requisicao
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store()
    {
        $validatedData = request()->validate(Requisicao::validationRules());

        $requisicao = Requisicao::create($validatedData);

        return redirect()->route('admin.requisicaos.index')->with([
            'type' => 'success',
            'message' => 'Requisicao added'
        ]);
    }

    /**
     * Show the form for editing the specified Requisicao
     *
     * @param \App\Requisicao $requisicao
     * @return \Illuminate\Http\Response
     */
    public function edit(Requisicao $requisicao)
    {
        $proprietarios = Proprietario::all();
        $servicos = Servico::all();
        $setors = Setor::all();
        $statuses = Status::all();

        return view('admin.requisicaos.edit', compact('requisicao', 'proprietarios', 'servicos', 'setors', 'statuses'));
    }

    /**
     * Update the Requisicao
     *
     * @param \App\Requisicao $requisicao
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Requisicao $requisicao)
    {
        $validatedData = request()->validate(
            Requisicao::validationRules($requisicao->id)
        );

        $requisicao->update($validatedData);

        return redirect()->route('admin.requisicaos.index')->with([
            'type' => 'success',
            'message' => 'Requisicao Updated'
        ]);
    }

    /**
     * Delete the Requisicao
     *
     * @param \App\Requisicao $requisicao
     * @return void
     */
    public function destroy(Requisicao $requisicao)
    {
        if ($requisicao->usuarios()->count() || $requisicao->contagems()->count()) {
            return redirect()->route('admin.requisicaos.index')->with([
                'type' => 'error',
                'message' => 'This record cannot be deleted as there are relationship dependencies.'
            ]);
        }

        $requisicao->delete();

        return redirect()->route('admin.requisicaos.index')->with([
            'type' => 'success',
            'message' => 'Requisicao deleted successfully'
        ]);
    }
}
