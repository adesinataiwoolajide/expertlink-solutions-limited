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
            $table->string('userSlug')->references('slug')->on('users')->onDelete('cascade');
            $table->string('courseSlug')->references('slug')->on('courses')->onDelete('cascade');
            $table->string('programSlug')->references('slug')->on('programs')->onDelete('cascade');
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('deleted_at')->nullable();

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
