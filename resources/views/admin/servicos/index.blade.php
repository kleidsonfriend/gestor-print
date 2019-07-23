@extends('admin.layouts.app', ['page' => 'servico'])

@section('title', 'Servicos')

@section('content')
<div class="card-header">
    <div class="row">
        <div class="col-6 pt-2 h5">
            <i class="fa fa-tint"></i>
            Servicos
        </div>

        <div class="col-6 text-right">
            <a class="btn btn-md btn-square btn-secondary"
                href="{{ route('admin.servicos.create') }}"
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
                <th>Servico</th>
                <th>Descricao</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($servicos as $servico)
                <tr>
                    <td>{{ $servico->id }}</td>
                    <td>{{ $servico->getServico() }}</td>
                    <td>{{ $servico->descricao }}</td>
                    <td>
                        <a class="btn btn-pill btn-sm btn-warning"
                            href="{{ route('admin.servicos.edit', ['servico' => $servico->id]) }}"
                        >
                            <i class="fa fa-pencil-square-o"></i>
                        </a>

                        <form action="{{ route('admin.servicos.destroy', ['servico' => $servico->id]) }}"
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
                    <td colspan="4">No records found</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $servicos->links() }}
</div>
@endsection
