<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
class ProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('programs')->insert([
        [
            'slug' =>RandomString(7),
            'program_name' => 'Web Development Bootcamp',
            'banner' => 'els.png',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'slug' => RandomString(7),
            'program_name' => 'Data Masterclass',
            'banner' => 'els.png',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'slug' => RandomString(7),
            'program_name' => 'Design Fundamentals',
            'banner' => 'els.png',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'slug' => RandomString(7),
            'program_name' => 'Cybersecurity Essentials',
            'banner' => 'els.png',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'slug' => RandomString(7),
            'program_name' => 'Digital Marketing Strategy',
            'banner' => 'els.png',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'slug' => RandomString(7),
            'program_name' => 'Software Engineering Immersive',
            'banner' => 'els.png',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'slug' => RandomString(7),
            'program_name' => 'Product Management Accelerator',
            'banner' => 'els.png',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'slug' => RandomString(7),
            'program_name' => 'Cloud Computing & DevOps',
            'banner' => 'els.png',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
           'slug' => RandomString(7),
            'program_name' => 'Artificial Intelligence & Machine Learning',
            'banner' => 'els.png',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'slug' => RandomString(7),
            'program_name' => 'Business Analytics & Intelligence',
            'banner' => 'els.png',
            'created_at' => now(),
            'updated_at' => now(),
        ],

        [
            'slug' => RandomString(7),
            'program_name' => 'Robotics Process Automation',
            'banner' => 'els.png',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'slug' => RandomString(7),
            'program_name' => 'Database Management Systems',
            'banner' => 'els.png',
            'created_at' => now(),
            'updated_at' => now(),
        ],

    ]);

    }
}
