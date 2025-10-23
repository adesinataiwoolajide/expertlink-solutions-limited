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
        Schema::create('course_allocations', function (Blueprint $table) {
            $table->bigIncrements('allocation_id');
            $table->string('slug')->default(RandomString(7));
            $table->unsignedBigInteger('user_id')->references('user_id')->on('users')->onDelete('cascade');
            $table->string('courseSlug')->references('slug')->on('courses')->onDelete('cascade');
            $table->unsignedBigInteger('programSlug')->references('slug')->on('programs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_allocations');
    }
};
