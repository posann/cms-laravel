<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('permit_documents', function (Blueprint $table) {
            $table->id();

            // Relation
            $table->foreignId('permit_category_id')
                ->constrained('permit_categories')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            // Basic fields
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('description')->nullable();

            // Metadata
            $table->timestamp('published_at')->nullable();
            $table->unsignedBigInteger('download_count')->default(0);

            // Storage or external link
            $table->string('file_path')->nullable();    // stored file path on disk
            $table->string('external_url')->nullable(); // external PDF URL

            // Visibility
            $table->boolean('is_active')->default(true);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('permit_documents');
    }
};