@extends('admin.layouts.app', ['page' => 'servico'])

@section('title', 'Edit Servico')

@section('content')
<div class="card-header">
    <div class="row">
        <div class="col-6 pt-2 h5">
            <i class="fa fa-tint"></i>
            Edit Servico
        </div>
    </div>
</div>

<div class="card-body m-2">
    <form role="form" method="POST" action="{{ route('admin.servicos.update', ['servico' => $servico->id]) }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="servico">Servico</label>
            <select class="form-control"
                name="servico"
                required
                id="servico"
            >
                @foreach ($servicoOptions as $key => $value)
                    <option value="{{ $key }}"
                        {{ old('servico', $servico->servico) == $key ? 'selected' : '' }}
                    >
                        {{ $value }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="descricao">Descricao</label>
            <input type="text"
                class="form-control"
                name="descricao"
                required
                placeholder="Descricao"
                value="{{ old('descricao', $servico->descricao) }}"
                id="descricao"
            >
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-sm btn-primary">
                Update
            </button>

            <a class="btn btn-sm btn-danger"
                href="{{ route('admin.servicos.index') }}"
            >
                Cancel
            </a>
        </div>
    </form>
</div>
@endsection
