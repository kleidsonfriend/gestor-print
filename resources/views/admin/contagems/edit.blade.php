@extends('admin.layouts.app', ['page' => 'contagem'])

@section('title', 'Edit Contagem')

@section('content')
<div class="card-header">
    <div class="row">
        <div class="col-6 pt-2 h5">
            <i class="fa fa-tint"></i>
            Edit Contagem
        </div>
    </div>
</div>

<div class="card-body m-2">
    <form role="form" method="POST" action="{{ route('admin.contagems.update', ['contagem' => $contagem->id]) }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="id_impressora">Id Impressora</label>
            <input type="number"
                class="form-control"
                name="id_impressora"
                required
                placeholder="Id Impressora"
                value="{{ old('id_impressora', $contagem->id_impressora) }}"
                step="any"
                id="id_impressora"
            >
        </div>

        <div class="form-group">
            <label for="contagem">Contagem</label>
            <input type="number"
                class="form-control"
                name="contagem"
                required
                placeholder="Contagem"
                value="{{ old('contagem', $contagem->contagem) }}"
                step="any"
                id="contagem"
            >
        </div>

        <div class="form-group">
            <label for="data">Data</label>
            <input type="datetime-local"
                class="form-control"
                name="data"
                required
                placeholder="Data"
                value="{{ old('data', $contagem->data) }}"
                id="data"
            >
        </div>

        <div class="form-group">
            <label for="impressora-id">Impressora</label>
            <select class="form-control"
                name="impressora_id"
                required
                id="impressora-id"
            >
                @foreach ($impressoras as $impressora)
                    <option value="{{ $impressora->id }}"
                        {{ old('impressora_id', $contagem->impressora_id) == $impressora->id ? 'selected' : '' }}
                    >
                        {{ $impressora->descricao }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="requisicao-id">Requisicao</label>
            <select class="form-control"
                name="requisicao_id"
                required
                id="requisicao-id"
            >
                @foreach ($requisicaos as $requisicao)
                    <option value="{{ $requisicao->id }}"
                        {{ old('requisicao_id', $contagem->requisicao_id) == $requisicao->id ? 'selected' : '' }}
                    >
                        {{ $requisicao->resumo }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-sm btn-primary">
                Update
            </button>

            <a class="btn btn-sm btn-danger"
                href="{{ route('admin.contagems.index') }}"
            >
                Cancel
            </a>
        </div>
    </form>
</div>
@endsection
