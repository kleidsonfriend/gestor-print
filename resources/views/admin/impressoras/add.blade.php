@extends('admin.layouts.app', ['page' => 'impressora'])

@section('title', 'Add New Impressora')

@section('content')
<div class="card-header">
    <div class="row">
        <div class="col-6 pt-2 h5">
            <i class="fa fa-tint"></i>
            Add New Impressora
        </div>
    </div>
</div>

<div class="card-body m-2">
    <form role="form" method="POST" action="{{ route('admin.impressoras.store') }}">
        @csrf

        <div class="form-group">
            <label for="id_suprimento">Id Suprimento</label>
            <input type="number"
                class="form-control"
                name="id_suprimento"
                required
                placeholder="Id Suprimento"
                value="{{ old('id_suprimento') }}"
                step="any"
                id="id_suprimento"
            >
        </div>

        <div class="form-group">
            <label for="impressora">Impressora</label>
            <select class="form-control"
                name="impressora"
                required
                id="impressora"
            >
                @foreach ($impressoraOptions as $key => $value)
                    <option value="{{ $key }}"
                        {{ old('impressora') == $key ? 'selected' : '' }}
                    >
                        {{ $value }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="modelo">Modelo</label>
            <textarea class="form-control"
                name="modelo"
                id="modelo"
                required
                placeholder="Modelo"
            >{{ old('modelo') }}</textarea>
        </div>

        <div class="form-group">
            <label for="descricao">Descricao</label>
            <input type="text"
                class="form-control"
                name="descricao"
                required
                placeholder="Descricao"
                value="{{ old('descricao') }}"
                id="descricao"
            >
        </div>

        <div class="form-group">
            <label for="id_proprietario">Id Proprietario</label>
            <input type="number"
                class="form-control"
                name="id_proprietario"
                required
                placeholder="Id Proprietario"
                value="{{ old('id_proprietario') }}"
                step="any"
                id="id_proprietario"
            >
        </div>

        <div class="form-group">
            <label for="suprimento-id">Suprimento</label>
            <select class="form-control"
                name="suprimento_id"
                required
                id="suprimento-id"
            >
                @foreach ($suprimentos as $suprimento)
                    <option value="{{ $suprimento->id }}"
                        {{ old('suprimento_id') == $suprimento->id ? 'selected' : '' }}
                    >
                        {{ $suprimento->id }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-sm btn-primary">
                Submit
            </button>

            <a class="btn btn-sm btn-danger"
                href="{{ route('admin.impressoras.index') }}"
            >
                Cancel
            </a>
        </div>
    </form>
</div>
@endsection
