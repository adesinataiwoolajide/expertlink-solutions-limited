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
        Schema::create('assignment_submissions', function (Blueprint $table) {
            $table->id();
           // Core identifiers
            $table->string('slug');           
            $table->string('assignmentSlug');              // link to assignment
            $table->string('studentSlug');                 // link to student
            $table->string('courseSlug')->nullable();      // link to course
            $table->string('noteSlug')->nullable();        // link to note
            $table->string('instructorSlug')->nullable();  // link to instructor

            // Submission details
            $table->text('answer_text')->nullable();
            $table->integer('student_score')->default(0);
            $table->enum('submission_status', ['pending', 'submitted', 'graded'])->default('pending');
            $table->text('submission_remark')->nullable();
            $table->string('status')->default('active');
            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assignment_submissions');
    }
};
