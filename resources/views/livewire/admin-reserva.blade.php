<div>
    @if (session('info'))
        <div class="alert alert-primary" role="alert">
            <strong>¡Éxito!</strong>
            {{ session('info') }}
        </div>
    @endif
    <div class="card">

        <div class="card-header">
            <a class="btn btn-secondary" href="{{ route('booking.create') }}">NUEVA RESERVA</a>
        </div>

        @if ($reservas->count())
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Fecha</th>
                            <th>Fecha reserva</th>
                            <th>Hora inicio</th>
                            <th>Hora fin</th>
                            <th>Estado</th>
                            <th>User</th>
                            <th>Area</th>
                            <th colspan="2"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reservas as $reserva)
                            <tr>
                                <td>{{ $reserva->fecha }}</td>
                                <td>{{ $reserva->fecha_reserva }}</td>
                                <td>{{ $reserva->hora_inicio }}</td>
                                <td>{{ $reserva->hora_fin }}</td>
                                <td>{{ $reserva->estado }}</td>
                                <td>{{ $reserva->user->name }}</td>
                                <td>{{ $reserva->area->nombre }}</td>

                                <td width="10px">
                                    <a class="btn btn-primary" href="{{ route('booking.edit', $reserva) }}"><i
                                            class="fas fa-user-edit"></i></a>
                                </td>
                                <td width="10px">
                                    <form action="{{ route('booking.destroy', $reserva) }}" method="POST">
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
                {{ $reservas->links() }}
            </div>
        @else
            <div class="card-body">
                <strong>No hay registros ...</strong>
            </div>
        @endif

    </div>
</div>
