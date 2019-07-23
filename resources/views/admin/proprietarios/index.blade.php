@extends('admin.layouts.app', ['page' => 'proprietario'])

@section('title', 'Proprietarios')

@section('content')
<div class="card-header">
    <div class="row">
        <div class="col-6 pt-2 h5">
            <i class="fa fa-tint"></i>
            Proprietarios
        </div>

        <div class="col-6 text-right">
            <a class="btn btn-md btn-square btn-secondary"
                href="{{ route('admin.proprietarios.create') }}"
            >
                Add New
            </a>
        </div>
    </div>
</div>

<div class="card-body m-2">
    <table class="table table-responsive-sm">
        <thead>
            <tr>
                <th>#</th>
                <th>Proprietario</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($proprietarios as $proprietario)
                <tr>
                    <td>{{ $proprietario->id }}</td>
                    <td>{{ $proprietario->getProprietario() }}</td>
                    <td>
                        <a class="btn btn-pill btn-sm btn-warning"
                            href="{{ route('admin.proprietarios.edit', ['proprietario' => $proprietario->id]) }}"
                        >
                            <i class="fa fa-pencil-square-o"></i>
                        </a>

                        <form action="{{ route('admin.proprietarios.destroy', ['proprietario' => $proprietario->id]) }}"
                            method="POST"
                            class="inline pointer"
                        >
                            @csrf
                            @method('DELETE')

                            <a class="btn btn-pill btn-sm btn-danger"
                                onclick="if (confirm('Are you sure?')) { this.parentNode.submit() }"
                            >
                                <i class="fa fa-trash-o"></i>
                            </a>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">No records found</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $proprietarios->links() }}
</div>
@endsection
