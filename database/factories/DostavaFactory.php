<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class DostavaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'naziv' => $this->faker->domainWord(),
            'email' => $this->faker->unique()->safeEmail(),
        ];
    }
}
