@extends('admin.layouts.app', ['page' => 'requisicao'])

@section('title', 'Add New Requisicao')

@section('content')
<div class="card-header">
    <div class="row">
        <div class="col-6 pt-2 h5">
            <i class="fa fa-tint"></i>
            Add New Requisicao
        </div>
    </div>
</div>

<div class="card-body m-2">
    <form role="form" method="POST" action="{{ route('admin.requisicaos.store') }}">
        @csrf

        <div class="form-group">
            <label for="id_servico">Id Servico</label>
            <input type="number"
                class="form-control"
                name="id_servico"
                required
                placeholder="Id Servico"
                value="{{ old('id_servico') }}"
                step="any"
                id="id_servico"
            >
        </div>

        <div class="form-group">
            <label for="id_contagem">Id Contagem</label>
            <input type="number"
                class="form-control"
                name="id_contagem"
                required
                placeholder="Id Contagem"
                value="{{ old('id_contagem') }}"
                step="any"
                id="id_contagem"
            >
        </div>

        <div class="form-group">
            <label for="resumo">Resumo</label>
            <input type="text"
                class="form-control"
                name="resumo"
                required
                placeholder="Resumo"
                value="{{ old('resumo') }}"
                id="resumo"
            >
        </div>

        <div class="form-group">
            <label for="criado_por">Criado Por</label>
            <input type="number"
                class="form-control"
                name="criado_por"
                required
                placeholder="Criado Por"
                value="{{ old('criado_por') }}"
                step="any"
                id="criado_por"
            >
        </div>

        <div class="form-group">
            <label for="avaliado_por">Avaliado Por</label>
            <input type="number"
                class="form-control"
                name="avaliado_por"
                required
                placeholder="Avaliado Por"
                value="{{ old('avaliado_por') }}"
                step="any"
                id="avaliado_por"
            >
        </div>

        <div class="form-group">
            <label for="executado_por">Executado Por</label>
            <input type="number"
                class="form-control"
                name="executado_por"
                required
                placeholder="Executado Por"
                value="{{ old('executado_por') }}"
                step="any"
                id="executado_por"
            >
        </div>

        <div class="form-group">
            <label for="concluido_por">Concluido Por</label>
            <input type="number"
                class="form-control"
                name="concluido_por"
                required
                placeholder="Concluido Por"
                value="{{ old('concluido_por') }}"
                step="any"
                id="concluido_por"
            >
        </div>

        <div class="form-group">
            <label for="criado_em">Criado Em</label>
            <input type="datetime-local"
                class="form-control"
                name="criado_em"
                required
                placeholder="Criado Em"
                value="{{ old('criado_em') }}"
                id="criado_em"
            >
        </div>

        <div class="form-group">
            <label for="avaliado_em">Avaliado Em</label>
            <input type="datetime-local"
                class="form-control"
                name="avaliado_em"
                required
                placeholder="Avaliado Em"
                value="{{ old('avaliado_em') }}"
                id="avaliado_em"
            >
        </div>

        <div class="form-group">
            <label for="executado_em">Executado Em</label>
            <input type="datetime-local"
                class="form-control"
                name="executado_em"
                required
                placeholder="Executado Em"
                value="{{ old('executado_em') }}"
                id="executado_em"
            >
        </div>

        <div class="form-group">
            <label for="concluido_em">Concluido Em</label>
            <input type="datetime-local"
                class="form-control"
                name="concluido_em"
                required
                placeholder="Concluido Em"
                value="{{ old('concluido_em') }}"
                id="concluido_em"
            >
        </div>

        <div class="form-group">
            <label for="id_setor">Id Setor</label>
            <input type="number"
                class="form-control"
                name="id_setor"
                required
                placeholder="Id Setor"
                value="{{ old('id_setor') }}"
                step="any"
                id="id_setor"
            >
        </div>

        <div class="form-group">
            <label for="id_status">Id Status</label>
            <input type="number"
                class="form-control"
                name="id_status"
                required
                placeholder="Id Status"
                value="{{ old('id_status') }}"
                step="any"
                id="id_status"
            >
        </div>

        <div class="form-group">
            <label for="proprietario-id">Proprietario</label>
            <select class="form-control"
                name="proprietario_id"
                required
                id="proprietario-id"
            >
                @foreach ($proprietarios as $proprietario)
                    <option value="{{ $proprietario->id }}"
                        {{ old('proprietario_id') == $proprietario->id ? 'selected' : '' }}
                    >
                        {{ $proprietario->id }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="servico-id">Servico</label>
            <select class="form-control"
                name="servico_id"
                required
                id="servico-id"
            >
                @foreach ($servicos as $servico)
                    <option value="{{ $servico->id }}"
                        {{ old('servico_id') == $servico->id ? 'selected' : '' }}
                    >
                        {{ $servico->descricao }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="setor-id">Setor</label>
            <select class="form-control"
                name="setor_id"
                required
                id="setor-id"
            >
                @foreach ($setors as $setor)
                    <option value="{{ $setor->id }}"
                        {{ old('setor_id') == $setor->id ? 'selected' : '' }}
                    >
                        {{ $setor->id }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="status-id">Status</label>
            <select class="form-control"
                name="status_id"
                required
                id="status-id"
            >
                @foreach ($statuses as $status)
                    <option value="{{ $status->id }}"
                        {{ old('status_id') == $status->id ? 'selected' : '' }}
                    >
                        {{ $status->id }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-sm btn-primary">
                Submit
            </button>

            <a class="btn btn-sm btn-danger"
                href="{{ route('admin.requisicaos.index') }}"
            >
                Cancel
            </a>
        </div>
    </form>
</div>
@endsection
