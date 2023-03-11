<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Event;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(10)->create();
        $this->call([
            CompanySeeder::class,
            RoleSeeder::class,
            ServiceSeeder::class,
            UnitySeeder::class,
            DepotSeeder::class,
            CategorySeeder::class,
            UserSeeder::class,
            ProductSeeder::class,
            SaleSeeder::class,
        ]);
    }
}
