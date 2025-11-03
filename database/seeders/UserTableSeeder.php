<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use DB;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('users')->insert([
        	[
                'first_name'  => 'Taiwo',
                'last_name'   => 'Adesina',
                'email' => 'tolajide74@gmail.com',
                'password' => bcrypt('password'),
                'role' => 'Administrator',
                'status' => true,
                'phone_number' => '08138139333',
                'email_verified_at' => now(),
                'slug' => RandomString(7),
                'change_password' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'first_name' => 'Olajide',
                'last_name' => 'Victor',
                'email' => 'tolajide75@gmail.com',
                'password' => bcrypt('password'),
                'role' => 'Admin',
                'status' => 1,
                'phone_number' => '09072281204',
                'email_verified_at' => now(),
                'slug' => RandomString(7),
                'change_password' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}