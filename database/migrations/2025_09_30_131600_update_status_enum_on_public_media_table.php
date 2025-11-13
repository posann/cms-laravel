<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // Expand status enum to match News: draft, pending, published, archived
        DB::statement("ALTER TABLE public_media MODIFY COLUMN status ENUM('draft','pending','published','archived') NOT NULL DEFAULT 'draft'");
    }

    public function down(): void
    {
        // Revert back to previous enum set
        DB::statement("ALTER TABLE public_media MODIFY COLUMN status ENUM('draft','published') NOT NULL DEFAULT 'draft'");
    }
};