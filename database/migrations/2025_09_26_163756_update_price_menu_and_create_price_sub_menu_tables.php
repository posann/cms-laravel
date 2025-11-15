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
        // 1. Ubah kolom sub_name menjadi sub_name_id di price_menu
        Schema::table('price_menu', function (Blueprint $table) {
            $table->unsignedBigInteger('sub_name_id')->nullable()->after('name');
            $table->dropColumn('sub_name');
        });

        // 2. Buat tabel price_sub_menu
        Schema::create('price_sub_menu', function (Blueprint $table) {
            $table->id();
            $table->string('sub_name', 200);
            $table->boolean('status')->default(true); // aktif/nonaktif
            $table->timestamps();
        });

        // 3. Tambah foreign key ke price_menu
        Schema::table('price_menu', function (Blueprint $table) {
            $table->foreign('sub_name_id')
                ->references('id')
                ->on('price_sub_menu')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Rollback foreign key
        Schema::table('price_menu', function (Blueprint $table) {
            $table->dropForeign(['sub_name_id']);
            $table->dropColumn('sub_name_id');
            $table->string('sub_name', 200)->nullable();
        });

        Schema::dropIfExists('price_sub_menu');
    }
};
