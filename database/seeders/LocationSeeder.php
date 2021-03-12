<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $locations = [
            [
                'country_id'=> 1,
                'state_id'=> 1,
                'city_id'=> 1,
                'address' => 'Direccion 1'
            ],
            [
                'country_id'=> 1,
                'state_id'=> 1,
                'city_id'=> 2,
                'address' => 'Direccion 2'
            ],
            [
                'country_id'=> 1,
                'state_id'=> 1,
                'city_id'=> 2,
                'address' => 'Direccion 3'
            ],
            [
                'country_id'=> 1,
                'state_id'=> 1,
                'city_id'=> 1,
                'address' => 'Direccion 4'
            ],
            [
                'country_id'=> 1,
                'state_id'=> 1,
                'city_id'=> 2,
                'address' => 'Direccion 5'
            ],
            [
                'country_id'=> 1,
                'state_id'=> 1,
                'city_id'=> 2,
                'address' => 'Direccion 6'
            ],
            [
                'country_id'=> 1,
                'state_id'=> 1,
                'city_id'=> 2,
                'address' => 'Direccion 7'
            ],
            [
                'country_id'=> 1,
                'state_id'=> 2,
                'city_id'=> 3,
                'address' => 'Direccion 8'
            ],
            [
                'country_id'=> 1,
                'state_id'=> 2,
                'city_id'=> 3,
                'address' => 'Direccion 9'
            ],
            [
                'country_id'=> 1,
                'state_id'=> 2,
                'city_id'=> 1,
                'address' => 'Direccion 10'
            ],
            [
                'country_id'=> 1,
                'state_id'=> 2,
                'city_id'=> 3,
                'address' => 'Direccion 11'
            ],
            [
                'country_id'=> 1,
                'state_id'=> 2,
                'city_id'=> 4,
                'address' => 'Direccion 12'
            ],
            [
                'country_id'=> 1,
                'state_id'=> 2,
                'city_id'=> 3,
                'address' => 'Direccion 13'
            ],
            [
                'country_id'=> 1,
                'state_id'=> 2,
                'city_id'=> 4,
                'address' => 'Direccion 14'
            ],
            [
                'country_id'=> 1,
                'state_id'=> 2,
                'city_id'=> 4,
                'address' => 'Direccion 15'
            ],
        ];

        DB::table('locations')->insert($locations);
    }
}
