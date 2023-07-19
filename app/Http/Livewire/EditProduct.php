<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;

class EditProduct extends Component
{
    public $product, $categories;
    public $category_id;
    public $marca, $nombre, $descripcion;
    public function mount(Product $product)
    {
        $this->product = $product;

        $this->categories = Category::all();
        $this->category_id = $product->category->id;
        $this->marca = $product->marca;
        $this->descripcion = $product->descripcion;
        $this->nombre = $product->nombre;
    }
    public function save()
    {
        // Validar los datos en tiempo real utilizando las directivas de Livewire
        $this->validate([
            'nombre' => 'required|string|max:255',
            'marca' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'category_id' => 'required|exists:categories,id'
        ]);

        // Actualizar el producto en la base de datos utilizando Eloquent
        $this->product->update([
            'nombre' => $this->nombre,
            'marca' => $this->marca,
            'descripcion' => $this->descripcion,
            'category_id' => $this->category_id,
        ]);

        $this->emit('saved');

        // Redireccionar o mostrar un mensaje de éxito
    }
    public function render()
    {
        return view('livewire.edit-product');
    }
}
