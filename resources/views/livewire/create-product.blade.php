<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12 text-gray-50">
    <h1 class="text-3xl text-center font-semibold mb-8">Complete esta informacion para crear un producto</h1>

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
    <div class="flex">
        <x-button class="ml-auto" wire:click="save" wire:loading.attr="disabled" wire:target="save">
            Crear Producto
        </x-button>
    </div>
</div>
