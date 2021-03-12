<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cities = [
            [
                'name'=> 'Lima',
                'state_id'=> 1
            ],
            [
                'name'=> 'Huacho',
                'state_id'=> 1,
            ],
            [
                'name'=> 'Cerro de Pasco',
                'state_id'=> 2,
            ],
            [
                'name'=> 'Oxapampa',
                'state_id'=> 2,
            ],
            [
                'name'=> 'Caracas',
                'state_id'=> 3,
            ],
            [
                'name'=> 'Cua',
                'state_id'=> 4,
            ],
            [
                'name'=> 'Charallave',
                'state_id'=> 4,
            ],
        ];

        DB::table('cities')->insert($cities);
    }
}
