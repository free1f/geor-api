<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'name'=>'vip',
                'slug'=>'vip',
                'description'=>'highest role',
                'code'=>'99',
                'created_at' => now()
            ],
            [
                'name'=>'admin',
                'slug'=>'admin',
                'description'=>'admin role',
                'code'=>'88',
                'created_at' => now()
            ],
            [
                'name'=>'client',
                'slug'=>'client',
                'description'=>'client role',
                'code'=>'77',
                'created_at' => now()
            ],
        ];

        DB::table('roles')->insert($roles);
    }
}
