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
        Schema::create('course_notes', function (Blueprint $table) {
            $table->id();
            $table->text('slug');
            $table->longText('topic');
            $table->longText('content');
            $table->longText('title');
            $table->longText('chapter');
            $table->text('link_one')->nullable();
            $table->text('link_two')->nullable();
            $table->text('link_three')->nullable();
            $table->text('link_four')->nullable();
            $table->boolean('status')->nullable()->default(true);
            $table->text('addedByUserSlug');
            $table->text('instructorSlug')->references('slug')->on('users')->onDelete('cascade');
            $table->text('allocatonSlug')->references('slug')->on('course_allocations')->onDelete('cascade');
            $table->text('courseSlug')->references('slug')->on('courses')->onDelete('cascade');
            $table->text('programSlug')->references('slug')->on('subscriptions')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_notes');
    }
};
