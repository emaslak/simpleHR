<?php

use Illuminate\Database\Seeder;
use App\Location;

class LocationTableSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Location::create([
             'name' => 'Lithuania',
        ]);
        Location::create([
             'name' => 'England',
        ]);
        Location::create([
             'name' => 'Germany',
        ]);
    }
}