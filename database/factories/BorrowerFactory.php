<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BorrowerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'status' => rand(0, 1),
            'staff_id' => $this->faker->numerify('sf-####'),
            'item_id' => rand(1, 3),
            'department_id' => rand(1, 2),
            'user_id' => rand(1, 2),
        ];
    }
}
