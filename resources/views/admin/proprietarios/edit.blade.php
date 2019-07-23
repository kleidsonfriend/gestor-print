@extends('admin.layouts.app', ['page' => 'proprietario'])

@section('title', 'Edit Proprietario')

@section('content')
<div class="card-header">
    <div class="row">
        <div class="col-6 pt-2 h5">
            <i class="fa fa-tint"></i>
            Edit Proprietario
        </div>
    </div>
</div>

<div class="card-body m-2">
    <form role="form" method="POST" action="{{ route('admin.proprietarios.update', ['proprietario' => $proprietario->id]) }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Proprietario</label>
            <div>
                @foreach ($proprietarioOptions as $key => $value)
                    <label class="radio-inline">
                        <input type="radio"
                            name="proprietario"
                            value="{{ $key }}"
                            {{ old('proprietario', $proprietario->proprietario) == $key ? 'checked' : '' }}
                        >
                            {{ $value }}
                    </label>
                @endforeach
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-sm btn-primary">
                Update
            </button>

            <a class="btn btn-sm btn-danger"
                href="{{ route('admin.proprietarios.index') }}"
            >
                Cancel
            </a>
        </div>
    </form>
</div>
@endsection
