@extends('admin.layouts.app', ['page' => 'requisicao'])

@section('title', 'Requisicaos')

@section('content')
<div class="card-header">
    <div class="row">
        <div class="col-6 pt-2 h5">
            <i class="fa fa-tint"></i>
            Requisicaos
        </div>

        <div class="col-6 text-right">
            <a class="btn btn-md btn-square btn-secondary"
                href="{{ route('admin.requisicaos.create') }}"
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
                <th>Id Servico</th>
                <th>Id Contagem</th>
                <th>Resumo</th>
                <th>Criado Por</th>
                <th>Servico</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($requisicaos as $requisicao)
                <tr>
                    <td>{{ $requisicao->id }}</td>
                    <td>{{ $requisicao->id_servico }}</td>
                    <td>{{ $requisicao->id_contagem }}</td>
                    <td>{{ $requisicao->resumo }}</td>
                    <td>{{ $requisicao->criado_por }}</td>
                    <td>{{ $requisicao->servico->descricao }}</td>
                    <td>
                        <a class="btn btn-pill btn-sm btn-warning"
                            href="{{ route('admin.requisicaos.edit', ['requisicao' => $requisicao->id]) }}"
                        >
                            <i class="fa fa-pencil-square-o"></i>
                        </a>

                        <form action="{{ route('admin.requisicaos.destroy', ['requisicao' => $requisicao->id]) }}"
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
                    <td colspan="7">No records found</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $requisicaos->links() }}
</div>
@endsection
