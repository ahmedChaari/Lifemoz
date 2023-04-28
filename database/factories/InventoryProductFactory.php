<?php

namespace Database\Factories;

use App\Models\Inventory;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class InventoryProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        return [
            'id'                => $this->faker->uuid,
            'product_id'        => Product::all()->random()->id,
            'inventory_id'      => Inventory::all()->random()->id,
            'quantite_en_ligne' =>  $this->faker->numerify('###'),
            'quantite_en_stock' =>  $this->faker->numerify('###'),
            'achat'             => $this->faker->numerify('##'),
        ];
    }
}
