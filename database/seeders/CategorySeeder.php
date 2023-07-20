<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Insertar la categoría "Maquinas"
        Category::create([
            'nombre' => 'Maquinas',
        ]);

        // Insertar la categoría "Areas"
        Category::create([
            'nombre' => 'Areas',
        ]);
    }
}
