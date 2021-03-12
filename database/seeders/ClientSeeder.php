<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $clients = [
            [
                'concessionaire_id' => 1,
                'name'=> 'User 1',
                'last_name' => 'Lastname user1',
                'identification' => (string) Str::uuid()
            ],
            [
                'concessionaire_id' => 1,
                'name'=> 'User 2',
                'last_name' => 'Lastname user2',
                'identification' => (string) Str::uuid()
            ],
            [
                'concessionaire_id' => 3,
                'name'=> 'User 3',
                'last_name' => 'Lastname user3',
                'identification' => (string) Str::uuid()
            ],
        ];

        DB::table('clients')->insert($clients);
    }
}
