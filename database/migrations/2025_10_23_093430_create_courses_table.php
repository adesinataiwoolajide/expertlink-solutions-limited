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
        Schema::create('courses', function (Blueprint $table) {
            $table->bigIncrements('course_id');
            $table->string('slug')->default(RandomString(12));
            $table->string('course_name');
            $table->string('programSlug');
            $table->longText('course_price')->default(10000);
            $table->string('user_id');
            $table->longText('banner')->nullable();
            $table->longText('basic_requirements')->nullable();
            $table->longText('course_outline')->nullable();
            $table->longText('learning_module')->nullable();
            $table->longText('course_schedule')->nullable();
            $table->longText('training_type')->nullable();
            $table->longText('payment_structure')->nullable();
            $table->longText('course_overview')->nullable();
            $table->longText('course_technologies')->nullable();
            $table->longText('packages_included')->nullable();
            $table->longText('benefits')->nullable();
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
        Schema::dropIfExists('courses');
    }
};
