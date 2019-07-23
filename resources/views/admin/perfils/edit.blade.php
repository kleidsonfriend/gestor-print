@extends('admin.layouts.app', ['page' => 'perfil'])

@section('title', 'Edit Perfil')

@section('content')
<div class="card-header">
    <div class="row">
        <div class="col-6 pt-2 h5">
            <i class="fa fa-tint"></i>
            Edit Perfil
        </div>
    </div>
</div>

<div class="card-body m-2">
    <form role="form" method="POST" action="{{ route('admin.perfils.update', ['perfil' => $perfil->id]) }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="perfil">Perfil</label>
            <select class="form-control"
                name="perfil"
                required
                id="perfil"
            >
                @foreach ($perfilOptions as $key => $value)
                    <option value="{{ $key }}"
                        {{ old('perfil', $perfil->perfil) == $key ? 'selected' : '' }}
                    >
                        {{ $value }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="permissao">Permissao</label>
            <textarea class="form-control"
                name="permissao"
                id="permissao"
                required
                placeholder="Permissao"
            >{{ old('permissao', $perfil->permissao) }}</textarea>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-sm btn-primary">
                Update
            </button>

            <a class="btn btn-sm btn-danger"
                href="{{ route('admin.perfils.index') }}"
            >
                Cancel
            </a>
        </div>
    </form>
</div>
@endsection
