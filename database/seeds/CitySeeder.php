<?php

use App\City;
use App\Client;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        City::firstOrCreate([
            'name' => 'Cali'
        ]);

        City::firstOrCreate([
            'name' => 'Medellin'
        ]);

        City::firstOrCreate([
            'name' => 'Bogota'
        ]);
    }
}
