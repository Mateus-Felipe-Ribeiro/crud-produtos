<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nome' => $this->faker->word, // Palavra aleatória
            'descricao' => $this->faker->sentence, // Frase aleatória
            'valor' => $this->faker->randomFloat(2, 10, 1000), // Decimal entre 10.00 e 1000.00
            'quantidade' => $this->faker->randomFloat(1, 0.1, 100), // Decimal com 1 casa (0.1 a 100.0)
            'foto' => null,
        ];
    }
}
