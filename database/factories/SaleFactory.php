<?php

namespace Database\Factories;

use App\Models\Depot;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class SaleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

      function rand_string($length) {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        return substr(str_shuffle($chars),0,$length);
    }
    public function definition()
    {
        return [
            'id'          => $this->faker->uuid,
            'code'        => $this->rand_string(10),
            'product_id'  => Product::all()->random()->id,
            'depot_id'    => Depot::all()->random()->id,
            'quantite'    => $this->faker->numerify('###'),
            'price'       => $this->faker->numerify('##'),
        ];
    }
}
