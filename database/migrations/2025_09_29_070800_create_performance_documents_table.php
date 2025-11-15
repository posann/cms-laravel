<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('performance_documents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('performance_category_id')
                ->constrained('performance_categories')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->string('title')->index();
            $table->longText('description')->nullable();

            $table->dateTime('published_at')->nullable()->index();

            $table->unsignedBigInteger('download_count')->default(0);

            // Either store file path or external URL (one of them should be present)
            $table->string('file_path')->nullable();
            $table->string('external_url')->nullable();

            $table->boolean('is_active')->default(true)->index();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('performance_documents');
    }
};