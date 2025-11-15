<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('public_media', function (Blueprint $table) {
            $table->id();

            // Enum type: 'photo' or 'video'
            $table->enum('type', ['photo', 'video'])->index();

            $table->string('title')->index();
            $table->longText('description')->nullable();

            $table->dateTime('published_at')->nullable()->index();

            // For photos
            $table->string('image_path')->nullable();

            // For videos (external URL like YouTube/Vimeo or storage file)
            $table->string('video_url')->nullable();

            $table->boolean('is_active')->default(true)->index();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('public_media');
    }
};