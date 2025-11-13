<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('public_media', function (Blueprint $table) {
            // Slug for detail pages
            $table->string('slug')->unique()->after('title');

            // News-like fields
            $table->text('content_overview')->nullable()->after('slug');
            $table->longText('content_raw')->nullable()->after('content_overview');

            // Status like News
            $table->enum('status', ['draft', 'published'])->default('draft')->after('content_raw');

            // Optional tags (comma-separated)
            $table->string('tags')->nullable()->after('status');
        });
    }

    public function down(): void
    {
        Schema::table('public_media', function (Blueprint $table) {
            $table->dropColumn(['slug', 'content_overview', 'content_raw', 'status', 'tags']);
        });
    }
};