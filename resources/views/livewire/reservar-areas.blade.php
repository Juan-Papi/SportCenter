<div>
    <h1 class="px-8 py-6 bg-gray-800 border-b border-gray-700 text-gray-50 text-xl font-semibold">FORMULARIO PARA RESERVA
    </h1>
    {{-- <section class="bg-gray-800 rounded shadow-lg mb-12">

        <div class="px-8 py-6">
            <h1 class="text-gray-50 text-lg font-semibold mb-4">Fecha y hora</h1>
            <x-label>
                Fecha reserva
            </x-label>
            <x-input type="date" />

            <x-label>
                Hora inicio
            </x-label>
            <x-input type="time" />

            <x-label>
                Hora fin
            </x-label>
            <x-input type="time" />

        </div>
        <div class="px-8 py-6 border-t border-gray-700">
            <h1 class="text-gray-50 text-lg font-semibold mb-4">Contacto</h1>

            <x-label>
                Nombre
            </x-label>
            <x-input />
            <x-label>
                Paterno
            </x-label>
            <x-input />
            <x-label>
                Materno
            </x-label>
            <x-input />
            <x-label>
                Ciudad
            </x-label>
            <x-input />
            <x-label>
                Sexo
            </x-label>
            <x-input />
            <x-label>
                Telefono
            </x-label>
            <x-input />
        </div>

        <footer class="px-8 py-6 bg-gray-800 border-t border-gray-700">
            <div class="flex justify-end">
                <x-button>
                    Reservar
                </x-button>
            </div>
        </footer>
    </section> --}}
    <section class="bg-gray-800 rounded shadow-lg mb-12">



        <div class="px-8 py-6 border-t border-gray-700">

            <div class="grid grid-cols-2 gap-4 mb-4">
                <div>
                    <x-label>
                        AREA DEPORTIVA O COMUN
                    </x-label>
                    <!-- Utilizamos un select para el campo "Sexo" -->
                    <select class="w-full px-4 py-2 mt-2 bg-gray-800 border rounded-md border-gray-700 text-gray-100"
                        wire:model="selectedAreaId">
                        <option value="">Seleccionar área</option>
                        @foreach ($areas as $area)
                            <option value="{{ $area->id }}">{{ $area->nombre }}</option>
                        @endforeach
                    </select>
                    @error('selectedAreaId')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <x-label>
                        FECHA RESERVA
                    </x-label>
                    {{-- <x-input /> --}}
                    <input class="w-full px-4 py-2 mt-2 bg-gray-800 border rounded-md border-gray-700 text-gray-100"
                        type="date" wire:model="fecha_reserva">
                    @error('fecha_reserva')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <x-label>
                        HORA INICIO
                    </x-label>
                    {{-- <x-input /> --}}
                    <input type="time"
                        class="w-full px-4 py-2 mt-2 bg-gray-800 border rounded-md border-gray-700 text-gray-100"
                        wire:model="hora_inicio">
                    @error('hora_inicio')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <x-label>
                        HORA FIN
                    </x-label>
                    {{-- <x-input /> --}}
                    <input type="time"
                        class="w-full px-4 py-2 mt-2 bg-gray-800 border rounded-md border-gray-700 text-gray-100"
                        wire:model="hora_fin">
                    @error('hora_fin')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="px-8 py-6 border-t border-gray-700">
            <h1 class="text-gray-50 text-lg font-semibold mb-8">Contacto</h1>

            <div class="grid grid-cols-2 gap-4 mb-4">
                <div>
                    <x-label>
                        NOMBRE
                    </x-label>
                    {{-- <x-input /> --}}
                    <input class="w-full px-4 py-2 mt-2 bg-gray-800 border rounded-md border-gray-700 text-gray-100"
                        wire:model="nombre">
                    @error('nombre')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <x-label>
                        PATERNO
                    </x-label>
                    {{-- <x-input /> --}}
                    <input class="w-full px-4 py-2 mt-2 bg-gray-800 border rounded-md border-gray-700 text-gray-100"
                        wire:model="paterno">
                    @error('paterno')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <x-label>
                        MATERNO
                    </x-label>
                    {{-- <x-input /> --}}
                    <input class="w-full px-4 py-2 mt-2 bg-gray-800 border rounded-md border-gray-700 text-gray-100"
                        wire:model="materno">
                    @error('materno')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror

                </div>
                <div>
                    <x-label>
                        CIUDAD
                    </x-label>
                    {{-- <x-input /> --}}
                    <input class="w-full px-4 py-2 mt-2 bg-gray-800 border rounded-md border-gray-700 text-gray-100"
                        wire:model="ciudad">
                    @error('ciudad')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <x-label>
                        SEXO
                    </x-label>
                    <!-- Utilizamos un select para el campo "Sexo" -->
                    <select class="w-full px-4 py-2 mt-2 bg-gray-800 border rounded-md border-gray-700 text-gray-100"
                        wire:model="sexo">
                        <option value="">Seleccionar sexo</option>
                        <option value="masculino">Masculino</option>
                        <option value="femenino">Femenino</option>
                    </select>
                    @error('sexo')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <x-label>
                        TELEFONO
                    </x-label>
                    {{-- <x-input /> --}}
                    <input class="w-full px-4 py-2 mt-2 bg-gray-800 border rounded-md border-gray-700 text-gray-100"
                        wire:model="telefono">
                    @error('telefono')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>

        <footer class="px-8 py-6 bg-gray-800 border-t border-gray-700">
            <div class="flex justify-end">
                <x-button wire:click="reservar">
                    Reservar
                </x-button>
            </div>
        </footer>
    </section>

    @push('js')
        {{-- <script>
            //pedimos que escuche el evento crear
            Livewire.on('crear', function(message) {
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: message,
                    showConfirmButton: false,
                    timer: 1500
                })
            })
        </script> --}}
         <script>
            //pedimos que escuche el evento crear
            Livewire.on('crear', function(message) {
                Swal.fire(message)
            })
        </script>
    @endpush
</div>
