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
        Schema::create('blogs', function (Blueprint $table) {
            $table->bigIncrements('blog_id');
             $table->string('slug')->default(RandomString(7));
            $table->text('image');
            $table->text('heading');
            $table->longText('description');
            $table->boolean('status')->nullable()->default(false);
            $table->unsignedBigInteger('user_id')->references('id')->on('users')->onDelete('cascade')->default('1');
            $table->text('event_date')->nullable();
            $table->text('event_gallery')->nullable();
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
        Schema::dropIfExists('blogs');
    }
};
