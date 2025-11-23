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
            $table->string('slug');
            $table->string('instructorSlug')->nullable();
            $table->string('noteSlug')->nullable();
            $table->string('courseSlug')->nullable();

            $table->text('description');
            $table->date('due_date');
            $table->integer('max_score');
            $table->text('remark')->nullable();
            $table->string('submission_status')->default('submitted'); // submitted, graded, returned
            
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
