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
        Schema::create('testimonials', function (Blueprint $table) {
            $table->id();
            $table->string('google_review_id')->unique()->nullable();
            $table->string('author_name');
            $table->tinyInteger('rating');
            $table->text('text');
            $table->string('profile_photo_url')->nullable();
            $table->string('google_relative_time')->nullable();
            $table->string('source')->default('manual');
            $table->boolean('approved')->default(true);
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('testimonials');
    }
};
