<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ConcessionaireSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $concessionaires = [
            [
                'location_id' => 1,
                'user_id' => 1,
                'name'=> 'Concesionario 1',
                'RIF'=> Str::uuid(),
            ],
            [
                'location_id' => 2,
                'user_id' => 1,
                'name'=> 'Concesionario 2',
                'RIF'=> Str::uuid(),
            ],
            [
                'location_id' => 3,
                'user_id' => 1,
                'name'=> 'Concesionario 3',
                'RIF'=> Str::uuid(),
            ],
            [
                'location_id' => 4,
                'user_id' => 1,
                'name'=> 'Concesionario 4',
                'RIF'=> Str::uuid(),
            ],
            [
                'location_id' => 5,
                'user_id' => 1,
                'name'=> 'Concesionario 5',
                'RIF'=> Str::uuid(),
            ],
            [
                'location_id' => 6,
                'user_id' => 1,
                'name'=> 'Concesionario 6',
                'RIF'=> Str::uuid(),
            ],
            [
                'location_id' => 7,
                'user_id' => 1,
                'name'=> 'Concesionario 7',
                'RIF'=> Str::uuid(),
            ],
            [
                'location_id' => 8,
                'user_id' => 1,
                'name'=> 'Concesionario 8',
                'RIF'=> Str::uuid(),
            ],
            [
                'location_id' => 9,
                'user_id' => 1,
                'name'=> 'Concesionario 9',
                'RIF'=> Str::uuid(),
            ],
            [
                'location_id' => 10,
                'user_id' => 1,
                'name'=> 'Concesionario 10',
                'RIF'=> Str::uuid(),
            ],
            [
                'location_id' => 11,
                'user_id' => 1,
                'name'=> 'Concesionario 11',
                'RIF'=> Str::uuid(),
            ],
            [
                'location_id' => 12,
                'user_id' => 1,
                'name'=> 'Concesionario 12',
                'RIF'=> Str::uuid(),
            ],
            [
                'location_id' => 13,
                'user_id' => 1,
                'name'=> 'Concesionario 13',
                'RIF'=> Str::uuid(),
            ],
            [
                'location_id' => 14,
                'user_id' => 1,
                'name'=> 'Concesionario 14',
                'RIF'=> Str::uuid(),
            ],
            [
                'location_id' => 15,
                'user_id' => 1,
                'name'=> 'Concesionario 15',
                'RIF'=> Str::uuid(),
            ],
        ];

        DB::table('concessionaires')->insert($concessionaires);
    }
}
