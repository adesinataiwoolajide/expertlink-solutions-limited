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
        Schema::create('assignments', function (Blueprint $table) {
            $table->id();
            $table->string('studentSlug')->nullable();
            $table->string('instructorSlug')->nullable();
            $table->string('noteSlug')->nullable();
            $table->string('courseSlug')->nullable();

            // Assignment details
            $table->string('title');
            $table->text('description')->nullable();
            $table->date('due_date')->nullable();
            $table->integer('max_score')->nullable();
            $table->integer('score')->nullable();
            $table->string('status')->default('pending'); // pending, submitted, graded
            $table->text('remark')->nullable();

            $table->text('answer_text')->nullable();   // written response
            $table->string('file_path')->nullable();   // uploaded file reference
            $table->integer('student)score')->nullable();      // graded score
            $table->string('submission_status')->default('submitted'); // submitted, graded, returned
            $table->text('submission_remark')->nullable();

            // Timestamps + soft deletes
            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assignments');
    }
};
