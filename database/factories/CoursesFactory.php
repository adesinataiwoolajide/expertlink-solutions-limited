<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CoursesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = \App\Models\Courses::class;

    public function definition()
    {
        return [
            'slug' => Str::random(12),
            'course_name' => $this->faker->sentence(3),
            'banner' => 'default-banner.png',
            'user_id' => 1,
            'programSlug' =>  Str::random(12),
            'basic_requirements' => $this->faker->paragraph(),
            'course_outline' => $this->faker->paragraph(),
            'learning_module' => $this->faker->paragraph(),
            'course_schedule' => $this->faker->paragraph(),
            'training_type' => $this->faker->word(),
            'payment_structure' => $this->faker->paragraph(),
            'course_overview' => $this->faker->paragraph(),
            'course_technologies' => $this->faker->words(3, true),
            'packages_included' => $this->faker->sentence(),
            'benefits' => $this->faker->paragraph(),
            'created_at' => now(),
            'updated_at' => now(),
            
        ];
    }

}
