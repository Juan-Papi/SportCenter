<div>
    @if (session('info'))
        <div class="alert alert-primary" role="alert">
            <strong>¡Éxito!</strong>
            {{ session('info') }}
        </div>
    @endif
    <div class="card">

        <div class="card-header">
            <a class="btn btn-secondary" href="{{ route('area.create') }}">NUEVA AREA</a>
        </div>

        @if ($areas->count())
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Estado</th>
                            <th>Tipo</th>
                            <th>Descripcion</th>
                            <th colspan="2"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($areas as $area)
                            <tr>
                                <td>{{ $area->nombre }}</td>
                                <td>{{ $area->estado }}</td>
                                <td>{{ $area->tipo }}</td>
                                <td>{{ $area->descripcion }}</td>

                                <td width="10px">
                                    <a class="btn btn-primary" href="{{ route('area.edit', $area) }}"><i
                                            class="fas fa-user-edit"></i></a>
                                </td>
                                <td width="10px">
                                    <form action="{{ route('area.destroy', $area) }}" method="POST">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-danger" type="submit"><i
                                                class="fas fa-user-minus"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="card-footer">
                {{ $areas->links() }}
            </div>
        @else
            <div class="card-body">
                <strong>No hay registros ...</strong>
            </div>
        @endif

    </div>
</div>
