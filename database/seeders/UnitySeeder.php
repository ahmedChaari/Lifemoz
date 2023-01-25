<?php

namespace Database\Seeders;

use App\Models\Unity;
use Illuminate\Database\Seeder;

class UnitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Unity::create([
            'name'          =>   'Metre',
            'description'   =>   'Mtr',
            ]);
        Unity::create([
            'name'          =>   'kilograme',
            'description'   =>   'Kg',
            ]);
        Unity::create([
            'name'          =>   'longueur',
            'description'   =>   'Lg',
            ]);
        Unity::create([
            'name'          =>   'littre',
            'description'   =>   'Lt',
            ]);
        Unity::create([
            'name'          =>   'piece',
            'description'   =>   'Pc',
            ]);
    }
}
