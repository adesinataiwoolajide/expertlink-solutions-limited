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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('studentSlug')->nullable();
            $table->string('instructorSlug')->nullable();
            $table->string('noteSlug')->nullable();
            $table->string('courseSlug')->nullable();
            $table->string('status')->default('pending'); // e.g. pending, completed
            $table->integer('score')->nullable();
            $table->text('response')->nullable();
            $table->text('question')->nullable();
            $table->string('result')->nullable(); // pass/fail or similar
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
        Schema::dropIfExists('tasks');
    }
};
