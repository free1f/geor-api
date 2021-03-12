<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name'=> 'Lima',
                'country_id' => '1'
            ],
            [
                'name'=> 'Pasco',
                'country_id' => '1'
            ],
            [
                'name'=> 'Distrito Capital',
                'country_id' => '2'
            ],
            [
                'name'=> 'Miranda',
                'country_id' => '2'
            ],
        ];

        DB::table('states')->insert($data);
    }
}
