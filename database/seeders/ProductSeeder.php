<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Manual
        // $products = [
        //     ['nome' => 'Notebook Dell', 'valor' => 4299.90, 'quantidade' => 5.0],
        //     ['nome' => 'Mouse Logitech', 'valor' => 89.90, 'quantidade' => 20.0],
        //     ['nome' => 'Teclado Mecânico', 'valor' => 199.90, 'quantidade' => 10.0],
        //     ['nome' => 'Monitor 24"', 'valor' => 899.90, 'quantidade' => 8.0],
        //     ['nome' => 'Webcam HD', 'valor' => 149.90, 'quantidade' => 15.0],
        //     ['nome' => 'Notebook Dell Modelo 2', 'valor' => 4299.90, 'quantidade' => 5.0],
        //     ['nome' => 'Mouse Logitech Modelo 2', 'valor' => 89.90, 'quantidade' => 20.0],
        //     ['nome' => 'Teclado Mecânico Modelo 2', 'valor' => 199.90, 'quantidade' => 10.0],
        //     ['nome' => 'Monitor 24" Modelo 2', 'valor' => 899.90, 'quantidade' => 8.0],
        //     ['nome' => 'Webcam HD Modelo 2', 'valor' => 149.90, 'quantidade' => 15.0],
        // ];

        // Insere os produtos no banco
        // foreach ($products as $product) {
        //     Product::create($product);
        // }

        // Ou Faker
        Product::factory()->count(50)->create([
            'category_id' => Category::inRandomOrder()->first()->id,
        ]);

        echo "Seed de produtos concluído!\n";

    }
}
