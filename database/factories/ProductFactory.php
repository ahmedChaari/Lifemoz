<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Company;
use App\Models\Depot;
use App\Models\Unity;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
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
            'description' => $this->faker->paragraph(),
            'company_id'  => Company::all()->random()->id,
            'category_id' => Category::all()->random()->id,
            'depot_id'    => Depot::all()->random()->id,
            'user_id'     => User::all()->random()->id,
            'unity_id'    => Unity::all()->random()->id,
            'quantite'    => $this->faker->numerify('###'),
            'achat'       => $this->faker->numerify('##'),
            'vente'       => $this->faker->numerify('##'),
            'stock_min'   => $this->faker->numerify('##'),
        ];
    }
}
