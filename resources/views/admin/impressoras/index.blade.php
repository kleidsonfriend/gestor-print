@extends('admin.layouts.app', ['page' => 'impressora'])

@section('title', 'Impressoras')

@section('content')
<div class="card-header">
    <div class="row">
        <div class="col-6 pt-2 h5">
            <i class="fa fa-tint"></i>
            Impressoras
        </div>

        <div class="col-6 text-right">
            <a class="btn btn-md btn-square btn-secondary"
                href="{{ route('admin.impressoras.create') }}"
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
                <th>Id Suprimento</th>
                <th>Impressora</th>
                <th>Descricao</th>
                <th>Id Proprietario</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($impressoras as $impressora)
                <tr>
                    <td>{{ $impressora->id }}</td>
                    <td>{{ $impressora->id_suprimento }}</td>
                    <td>{{ $impressora->getImpressora() }}</td>
                    <td>{{ $impressora->descricao }}</td>
                    <td>{{ $impressora->id_proprietario }}</td>
                    <td>
                        <a class="btn btn-pill btn-sm btn-warning"
                            href="{{ route('admin.impressoras.edit', ['impressora' => $impressora->id]) }}"
                        >
                            <i class="fa fa-pencil-square-o"></i>
                        </a>

                        <form action="{{ route('admin.impressoras.destroy', ['impressora' => $impressora->id]) }}"
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

    {{ $impressoras->links() }}
</div>
@endsection
