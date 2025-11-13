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
        // Tambah kolom di price_menu
        Schema::table('price_menu', function (Blueprint $table) {
            $table->string('sub_name', 200)->nullable()->after('id');
        });

        // Hapus kolom di price
        Schema::table('price', function (Blueprint $table) {
            $table->dropColumn('name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Rollback tambah kolom
        Schema::table('price_menu', function (Blueprint $table) {
            $table->dropColumn('sub_name');
        });

        // Rollback hapus kolom
        Schema::table('price', function (Blueprint $table) {
            $table->string('name');
        });
    }
};
