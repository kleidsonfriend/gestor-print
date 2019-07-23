@extends('admin.layouts.app', ['page' => 'setor'])

@section('title', 'Setors')

@section('content')
<div class="card-header">
    <div class="row">
        <div class="col-6 pt-2 h5">
            <i class="fa fa-tint"></i>
            Setors
        </div>

        <div class="col-6 text-right">
            <a class="btn btn-md btn-square btn-secondary"
                href="{{ route('admin.setors.create') }}"
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
                <th>Setor</th>
                <th>Gerente</th>
                <th>Usuario</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($setors as $setor)
                <tr>
                    <td>{{ $setor->id }}</td>
                    <td>{{ $setor->getSetor() }}</td>
                    <td>{{ $setor->gerente }}</td>
                    <td>{{ $setor->usuario->nome }}</td>
                    <td>
                        <a class="btn btn-pill btn-sm btn-warning"
                            href="{{ route('admin.setors.edit', ['setor' => $setor->id]) }}"
                        >
                            <i class="fa fa-pencil-square-o"></i>
                        </a>

                        <form action="{{ route('admin.setors.destroy', ['setor' => $setor->id]) }}"
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
                    <td colspan="5">No records found</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $setors->links() }}
</div>
@endsection
