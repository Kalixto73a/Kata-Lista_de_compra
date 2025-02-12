<?php

namespace Database\Factories;

use App\Models\Lista;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lista>
 */
class ListaFactory extends Factory
{
    protected $model = Lista::class;
    
    public function definition(): array
    {
        return [
            'product_name' => 'Leche',
        ];
    }
}
