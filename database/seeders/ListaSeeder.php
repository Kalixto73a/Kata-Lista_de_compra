<?php

namespace Database\Seeders;

use App\Models\Lista;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ListaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
            'product_name' => 'Leche',
            ],
            [
            'product_name' => 'Pan',
            ],
        ];
        foreach ($products as $product) {
            Lista::create($product);
        }
    }
}
