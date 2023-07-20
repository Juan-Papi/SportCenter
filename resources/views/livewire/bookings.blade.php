<div>
    @if (count($reservas) > 0)
        <h1 class="px-8 py-6 bg-gray-800 border-b border-gray-700 text-gray-50 text-xl font-semibold">Mis reservas</h1>
        <div class="bg-gray-800 rounded shadow-lg py-6 px-8 overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="text-gray-50">
                        <th class="lg:w-1/5 md:w-1/4 sm:w-1/2 px-4 py-2 text-left">Área</th>
                        <th class="lg:w-1/5 md:w-1/4 sm:w-1/2 px-4 py-2 text-left">Fecha Reserva</th>
                        <th class="lg:w-1/5 md:w-1/4 sm:w-1/2 px-4 py-2 text-left">Hora Inicio</th>
                        <th class="lg:w-1/5 md:w-1/4 sm:w-1/2 px-4 py-2 text-left">Hora Fin</th>
                        <th class="lg:w-1/5 md:w-1/4 sm:w-1/2 px-4 py-2 text-left">Estado</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reservas as $reserva)
                        <tr class="text-gray-50">
                            <td class="lg:w-1/5 md:w-1/4 sm:w-1/2 px-4 py-2">{{ $reserva->area->nombre }}</td>
                            <td class="lg:w-1/5 md:w-1/4 sm:w-1/2 px-4 py-2">{{ $reserva->fecha_reserva }}</td>
                            <td class="lg:w-1/5 md:w-1/4 sm:w-1/2 px-4 py-2">{{ $reserva->hora_inicio }}</td>
                            <td class="lg:w-1/5 md:w-1/4 sm:w-1/2 px-4 py-2">{{ $reserva->hora_fin }}</td>
                            <td class="lg:w-1/5 md:w-1/4 sm:w-1/2 px-4 py-2">{{ $reserva->estado }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <p class="text-gray-50">No has reservado nada aún.</p>
    @endif
</div>
