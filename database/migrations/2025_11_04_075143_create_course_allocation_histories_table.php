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
        Schema::create('course_allocation_histories', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->default(RandomString(7));
            $table->text('allocationSlug');
            $table->text('previousUserSlug');
            $table->text('newUserSlug');
            $table->text('addedByUserSlug');
            $table->timestamps(); // Automatically adds created_at and updated_at
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_allocation_histories');
    }
};
