<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountrySeeder extends Seeder
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
                'name'=> 'Peru',
                'abb'=> 'pe',
                'prefix'=> '+51'
            ],
            [
                'name'=> 'Venezuela',
                'abb'=> 've',
                'prefix'=> '+58'
            ],
        ];

        DB::table('countries')->insert($data);
    }
}
