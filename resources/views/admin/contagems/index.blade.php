@extends('admin.layouts.app', ['page' => 'contagem'])

@section('title', 'Contagems')

@section('content')
<div class="card-header">
    <div class="row">
        <div class="col-6 pt-2 h5">
            <i class="fa fa-tint"></i>
            Contagems
        </div>

        <div class="col-6 text-right">
            <a class="btn btn-md btn-square btn-secondary"
                href="{{ route('admin.contagems.create') }}"
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
                <th>Id Impressora</th>
                <th>Contagem</th>
                <th>Data</th>
                <th>Impressora</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($contagems as $contagem)
                <tr>
                    <td>{{ $contagem->id }}</td>
                    <td>{{ $contagem->id_impressora }}</td>
                    <td>{{ $contagem->contagem }}</td>
                    <td>{{ $contagem->data }}</td>
                    <td>{{ $contagem->impressora->descricao }}</td>
                    <td>
                        <a class="btn btn-pill btn-sm btn-warning"
                            href="{{ route('admin.contagems.edit', ['contagem' => $contagem->id]) }}"
                        >
                            <i class="fa fa-pencil-square-o"></i>
                        </a>

                        <form action="{{ route('admin.contagems.destroy', ['contagem' => $contagem->id]) }}"
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
                    <td colspan="6">No records found</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $contagems->links() }}
</div>
@endsection
