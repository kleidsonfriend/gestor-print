@extends('admin.layouts.app', ['page' => 'status'])

@section('title', 'Add New Status')

@section('content')
<div class="card-header">
    <div class="row">
        <div class="col-6 pt-2 h5">
            <i class="fa fa-tint"></i>
            Add New Status
        </div>
    </div>
</div>

<div class="card-body m-2">
    <form role="form" method="POST" action="{{ route('admin.statuses.store') }}">
        @csrf

        <div class="form-group">
            <label for="status">Status</label>
            <select class="form-control"
                name="status"
                required
                id="status"
            >
                @foreach ($statusOptions as $key => $value)
                    <option value="{{ $key }}"
                        {{ old('status') == $key ? 'selected' : '' }}
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
                href="{{ route('admin.statuses.index') }}"
            >
                Cancel
            </a>
        </div>
    </form>
</div>
@endsection
