<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Artisan::call('passport:install --force');
        Artisan::call('voyager:install --with-dummy');

        $this->call([
            CitySeeder::class,
            ClientSeeder::class,
        ]);
    }
}
