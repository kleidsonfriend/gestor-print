@extends('admin.layouts.app', ['page' => 'usuario'])

@section('title', 'Add New Usuario')

@section('content')
<div class="card-header">
    <div class="row">
        <div class="col-6 pt-2 h5">
            <i class="fa fa-tint"></i>
            Add New Usuario
        </div>
    </div>
</div>

<div class="card-body m-2">
    <form role="form" method="POST" action="{{ route('admin.usuarios.store') }}">
        @csrf

        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text"
                class="form-control"
                name="nome"
                required
                placeholder="Nome"
                value="{{ old('nome') }}"
                id="nome"
            >
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email"
                class="form-control"
                name="email"
                required
                placeholder="Email"
                value="{{ old('email') }}"
                id="email"
            >
        </div>

        <div class="form-group">
            <label for="tel">Tel</label>
            <input type="text"
                class="form-control"
                name="tel"
                required
                placeholder="Tel"
                value="{{ old('tel') }}"
                id="tel"
            >
        </div>

        <div class="form-group">
            <label for="id_perfil">Id Perfil</label>
            <input type="number"
                class="form-control"
                name="id_perfil"
                required
                placeholder="Id Perfil"
                value="{{ old('id_perfil') }}"
                step="any"
                id="id_perfil"
            >
        </div>

        <div class="form-group">
            <label for="senha">Senha</label>
            <input type="password"
                class="form-control"
                name="senha"
                required
                placeholder="Senha"
                id="senha"
            >
        </div>

        <div class="form-group">
            <label for="senha-confirmation">Confirm Senha</label>
            <input type="password"
                class="form-control"
                name="senha_confirmation"
                required
                placeholder="Senha"
                id="senha-confirmation"
            >
        </div>

        <div class="form-group">
            <label for="perfil-id">Perfil</label>
            <select class="form-control"
                name="perfil_id"
                required
                id="perfil-id"
            >
                @foreach ($perfils as $perfil)
                    <option value="{{ $perfil->id }}"
                        {{ old('perfil_id') == $perfil->id ? 'selected' : '' }}
                    >
                        {{ $perfil->id }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="requisicaos">Requisicao</label>
            <select class="form-control"
                name="requisicaos[]"
                required
                multiple
                id="requisicaos"
            >
                @foreach ($requisicaos as $requisicao)
                    <option value="{{ $requisicao->id }}"
                        {{ is_array(old('requisicaos')) && in_array($requisicao->id, old('requisicaos')) ? 'selected' : '' }}
                    >
                        {{ $requisicao->resumo }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-sm btn-primary">
                Submit
            </button>

            <a class="btn btn-sm btn-danger"
                href="{{ route('admin.usuarios.index') }}"
            >
                Cancel
            </a>
        </div>
    </form>
</div>
@endsection
