<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Hapus kolom sub_name_id di price_menu
        Schema::table('price_menu', function (Blueprint $table) {
            if (Schema::hasColumn('price_menu', 'sub_name_id')) {
                $table->dropColumn('sub_name_id');
            }
        });

        // Tambahkan kolom price_menu_id di price_sub_menu
        Schema::table('price_sub_menu', function (Blueprint $table) {
            if (!Schema::hasColumn('price_sub_menu', 'price_menu_id')) {
                $table->foreignId('price_menu_id')
                      ->constrained('price_menu')
                      ->cascadeOnDelete();
            }
        });
    }

    public function down(): void
    {
        // rollback
        Schema::table('price_menu', function (Blueprint $table) {
            $table->foreignId('sub_name_id')->nullable();
        });

        Schema::table('price_sub_menu', function (Blueprint $table) {
            $table->dropConstrainedForeignId('price_menu_id');
        });
    }
};
