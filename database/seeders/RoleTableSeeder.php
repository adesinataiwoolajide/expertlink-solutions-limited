<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roles')->insert([

        	[
                'name' => 'Administrator',
                'guard_name' => 'web'
            ],

            [
                'name' => 'Admin',
                'guard_name' => 'web'
            ],

        ]);
    }
}
