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
    public function definition()
    {
        return [
            'nombre' => $this->faker->name(),
            'precio' => $this->faker->randomFloat(2, 0, 1000),
            'cantidad' => $this->faker->randomNumber(2),
            'descripcion' => $this->faker->paragraph(),
            'img_url' => 'https://bookemporiumbd.com/assets/images/default/default-product-img.jpg',
            'sku' => strtoupper(substr($this->faker->name(), 0, 3)) . $this->faker->randomNumber(4),
        ];
    }
}
