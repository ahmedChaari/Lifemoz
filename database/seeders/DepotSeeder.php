<?php

namespace Database\Seeders;

use App\Models\Depot;
use Illuminate\Database\Seeder;

class DepotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Depot::create([
            'name'          =>   'Depot prinsipale',
            ]);
        Depot::create([
            'name'          =>   'Depot secandaire',
            ]);
        Depot::create([
            'name'          =>   'Depot casablanca',
            ]);
    }
}
