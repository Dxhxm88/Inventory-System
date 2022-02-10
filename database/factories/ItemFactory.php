<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word(),
            'serial_number' => $this->faker->numerify('sn-######'),
            'status' => rand(0, 1),
            'category_id' => rand(1, 3),
            'supplier_id' => rand(1, 2),
        ];
    }
}
