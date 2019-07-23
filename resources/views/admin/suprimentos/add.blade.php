@extends('admin.layouts.app', ['page' => 'suprimento'])

@section('title', 'Add New Suprimento')

@section('content')
<div class="card-header">
    <div class="row">
        <div class="col-6 pt-2 h5">
            <i class="fa fa-tint"></i>
            Add New Suprimento
        </div>
    </div>
</div>

<div class="card-body m-2">
    <form role="form" method="POST" action="{{ route('admin.suprimentos.store') }}">
        @csrf

        <div class="form-group">
            <label>Tipo</label>
            <div>
                @foreach ($tipoOptions as $key => $value)
                    <label class="radio-inline">
                        <input type="radio"
                            name="tipo"
                            value="{{ $key }}"
                            {{ old('tipo') == $key ? 'checked' : '' }}
                        >
                            {{ $value }}
                    </label>
                @endforeach
            </div>
        </div>

        <div class="form-group">
            <label for="referencia">Referencia</label>
            <select class="form-control"
                name="referencia"
                required
                id="referencia"
            >
                @foreach ($referenciaOptions as $key => $value)
                    <option value="{{ $key }}"
                        {{ old('referencia') == $key ? 'selected' : '' }}
                    >
                        {{ $value }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-sm btn-primary">
                Submit
            </button>

            <a class="btn btn-sm btn-danger"
                href="{{ route('admin.suprimentos.index') }}"
            >
                Cancel
            </a>
        </div>
    </form>
</div>
@endsection
