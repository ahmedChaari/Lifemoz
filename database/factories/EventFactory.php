<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id'          => $this->faker->uuid,
            'name'        => $this->faker->name,
            'start'       => $this->faker->dateTimeBetween('2004-01-01', '2022-12-31'),
            'end'         => $this->faker->dateTimeBetween('2004-01-01', '2022-12-31'),
            'description' => $this->faker->paragraph(),
            'user_id'     => User::all()->random()->id,
        ];
    }
}
