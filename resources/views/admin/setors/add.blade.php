@extends('admin.layouts.app', ['page' => 'setor'])

@section('title', 'Add New Setor')

@section('content')
<div class="card-header">
    <div class="row">
        <div class="col-6 pt-2 h5">
            <i class="fa fa-tint"></i>
            Add New Setor
        </div>
    </div>
</div>

<div class="card-body m-2">
    <form role="form" method="POST" action="{{ route('admin.setors.store') }}">
        @csrf

        <div class="form-group">
            <label for="setor">Setor</label>
            <select class="form-control"
                name="setor"
                required
                id="setor"
            >
                @foreach ($setorOptions as $key => $value)
                    <option value="{{ $key }}"
                        {{ old('setor') == $key ? 'selected' : '' }}
                    >
                        {{ $value }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="sigla">Sigla</label>
            <textarea class="form-control"
                name="sigla"
                id="sigla"
                required
                placeholder="Sigla"
            >{{ old('sigla') }}</textarea>
        </div>

        <div class="form-group">
            <label for="gerente">Gerente</label>
            <input type="number"
                class="form-control"
                name="gerente"
                required
                placeholder="Gerente"
                value="{{ old('gerente') }}"
                step="any"
                id="gerente"
            >
        </div>

        <div class="form-group">
            <label for="usuario-id">Usuario</label>
            <select class="form-control"
                name="usuario_id"
                required
                id="usuario-id"
            >
                @foreach ($usuarios as $usuario)
                    <option value="{{ $usuario->id }}"
                        {{ old('usuario_id') == $usuario->id ? 'selected' : '' }}
                    >
                        {{ $usuario->nome }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-sm btn-primary">
                Submit
            </button>

            <a class="btn btn-sm btn-danger"
                href="{{ route('admin.setors.index') }}"
            >
                Cancel
            </a>
        </div>
    </form>
</div>
@endsection
