<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name'          =>   'métallique',
            'description'   =>   'Produit métallique',
            ]);
        Category::create([
            'name'          =>   'Sable',
            'description'   =>   'Sable concassé pour terrasse',
            ]);
        Category::create([
            'name'          =>   'Plastique',
            'description'   =>   'Plastique pour table',
            ]);
    }
}
