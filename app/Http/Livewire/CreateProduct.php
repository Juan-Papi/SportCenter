<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;

class CreateProduct extends Component
{
    public $categories;
    public $category_id;
    public $nombre;
    public $marca;
    public $descripcion;

    public function mount()
    {
        $this->categories = Category::all();
    }

    public function save()
    {
        // Definir las reglas de validación en el controlador de Laravel
        $rules = [
            'nombre' => 'required|string|max:255',
            'marca' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'category_id' => 'required|exists:categories,id'
        ];

        // Validar los datos utilizando el método validate()
        $validatedData = $this->validate($rules);

        // Si la validación pasa, guardar el producto en la base de datos
        $product = new Product([
            'nombre' => $validatedData['nombre'],
            'marca' => $validatedData['marca'],
            'descripcion' => $validatedData['descripcion'],
            'category_id' => $validatedData['category_id'],
        ]);

        $product->save();

        return redirect()->route('products.edit', $product);
    }
    public function render()
    {
        return view('livewire.create-product');
    }
}
