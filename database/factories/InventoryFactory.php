<?php

namespace Database\Factories;


use App\Models\Depot;
use App\Models\Company;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class InventoryFactory extends Factory
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
            'reference'       => $this->faker->bothify('?###??##'),
            'objet'       => $this->faker->name,
            'company_id'  => Company::all()->random()->id,
            'depot_id'    => Depot::all()->random()->id,
            'user_id'    => User::all()->random()->id,
            'status'      => $this->faker->boolean(),
        ];
    }
}
