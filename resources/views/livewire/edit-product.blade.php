<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12 text-gray-50">
    <h1 class="text-3xl text-center font-semibold mb-8">Complete esta informacion para crear un producto</h1>

    <div class="mb-4" wire:ignore>
        <form method="POST" action="{{ route('products.files', $product) }}" class="dropzone" id="my-awesome-dropzone">
        </form>
    </div>
    @if ($product->images)
        <section class="bg-gray-800 shadow-xl rounded-lg p-6 mb-4">
            <h1 class="text-2xl text-center font-semibold mb-2">Imagenes del producto</h1>
            <ul>
                @foreach ($product->images as $image)
                    <li>
                        <img src="{{ Storage::url($image->url) }}" alt="">
                    </li>
                @endforeach
            </ul>
        </section>
    @endif


    <div class="bg-gray-800 shadow-xl rounded-lg p-6">
        <div class="grid grid-cols-2">
            <div>
                <x-label value="Categorias" />
                <select class="w-full form-control" wire:model="category_id">
                    <option value="">Seleccione una categoria</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->nombre }}</option>
                    @endforeach
                </select>
                @error('category_id')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror

            </div>
            <div>
                <x-label value="Marca" />
                <x-input type="text" placeholder="Ingrese la marca" class="w-full" wire:model="marca" />
                @error('marca')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="mb-4">
            <x-label value="Nombre" />
            <x-input type="text" placeholder="Ingrese el nombre del producto" class="w-full" wire:model="nombre" />
            @error('nombre')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-4">
            <x-label value="Descripcion" />
            <textarea class="w-full bg-gray-900" cols="30" rows="5" wire:model="descripcion"></textarea>
            @error('descripcion')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>
        <div class="flex justify-end items-center mt-4">
            {{-- escucha el evento con nombre saved y muestra el msj --}}
            <x-action-message class="mr-3" on="saved">
                Actualizado
            </x-action-message>
            <x-button class="ml-auto" wire:click="save" wire:loading.attr="disabled" wire:target="save">
                Actualizar Producto
            </x-button>
        </div>
    </div>

    @push('js')
        <script>
            Dropzone.options.myAwesomeDropzone = { // camelized version of the `id`
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                dictDefaultMessage: "Arrastre una imagen al recuadro",
                acceptedFiles: 'image/*',
                paramName: "file", // The name that will be used to transfer the file
                maxFilesize: 2, // MB
                accept: function(file, done) {
                    if (file.name == "justinbieber.jpg") {
                        done("Naha, you don't.");
                    } else {
                        done();
                    }
                }
            };
        </script>
    @endpush
</div>
