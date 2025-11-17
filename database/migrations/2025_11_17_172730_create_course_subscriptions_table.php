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
        Schema::create('course_subscriptions', function (Blueprint $table) {
            $table->id();
            $table->string('userSlug');
            $table->string('slug');
            $table->string('paymentSlug');
            $table->string('courseSlug');
            $table->string('programSlug');
            $table->string('course_amount');
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
        Schema::dropIfExists('course_subscriptions');
    }
};
