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
        Schema::create('task_submissions', function (Blueprint $table) {
            $table->id();

            // Core identifiers
            $table->string('slug');           
            $table->string('taskSlug');                   // link to task
            $table->string('studentSlug');                // link to student
            $table->string('courseSlug')->nullable();     // link to course
            $table->string('noteSlug')->nullable();       // link to note
            $table->string('instructorSlug')->nullable(); // link to instructor
            // Submission details
            $table->text('response')->nullable();
            $table->integer('score')->nullable();
            // Status & remarks
            $table->string('status')->default('pending'); // lifecycle status
            $table->text('remark')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('task_submissions');
    }
};
