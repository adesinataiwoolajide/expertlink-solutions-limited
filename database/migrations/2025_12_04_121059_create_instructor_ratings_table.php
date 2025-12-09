<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('instructor_ratings', function (Blueprint $table) {
            $table->id();
            $table->string('slug');           
            $table->string('ratingScore')->default(0);                   // link to task
            $table->string('studentSlug');                // link to student
            $table->string('courseSlug')->nullable(); 
            $table->string('instructorSlug')->nullable(); 
            $table->string('ratingComment')->nullable(); 
            $table->string('ratingStatus')->default(false); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('instructor_ratings');
    }
};
