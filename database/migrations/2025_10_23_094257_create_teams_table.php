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
        Schema::create('teams', function (Blueprint $table) {
            $table->bigIncrements('team_id');
            $table->string('slug')->default(RandomString(7));
            $table->text('image');
            $table->text('first_name');
            $table->text('last_name');
            $table->text('email');
            $table->text('biography');
            $table->text('education');
            $table->text('speciality');
            $table->unsignedBigInteger('user_id')->references('id')->on('users')->onDelete('cascade')->default('1');
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
        Schema::dropIfExists('teams');
    }
};
