<?php

namespace Database\Seeders;

use App\Models\InventoryProduct;
use Illuminate\Database\Seeder;

class InventoryProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        InventoryProduct::factory(60)->create();

    }
}
