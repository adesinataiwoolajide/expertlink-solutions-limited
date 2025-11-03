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
            'banner' => 'web-dev-banner.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'slug' => RandomString(7),
            'program_name' => 'Data Masterclass',
            'banner' => 'data-science-banner.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'slug' => RandomString(7),
            'program_name' => 'Design Fundamentals',
            'banner' => 'ui-ux-banner.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'slug' => RandomString(7),
            'program_name' => 'Cybersecurity Essentials',
            'banner' => 'cyber-security-banner.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'slug' => RandomString(7),
            'program_name' => 'Digital Marketing Strategy',
            'banner' => 'marketing-banner.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'slug' => RandomString(7),
            'program_name' => 'Software Engineering Immersive',
            'banner' => 'software-eng-banner.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'slug' => RandomString(7),
            'program_name' => 'Product Management Accelerator',
            'banner' => 'product-mgmt-banner.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'slug' => RandomString(7),
            'program_name' => 'Cloud Computing & DevOps',
            'banner' => 'cloud-devops-banner.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
           'slug' => RandomString(7),
            'program_name' => 'Artificial Intelligence & Machine Learning',
            'banner' => 'ai-ml-banner.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'slug' => RandomString(7),
            'program_name' => 'Business Analytics & Intelligence',
            'banner' => 'biz-analytics-banner.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ],

        [
            'slug' => RandomString(7),
            'program_name' => 'Robotics Process Automation',
            'banner' => 'rpa-banner.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'slug' => RandomString(7),
            'program_name' => 'Database Management Systems',
            'banner' => 'database-banner.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ],

    ]);

    }
}
