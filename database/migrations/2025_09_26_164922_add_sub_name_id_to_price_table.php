<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('price', function (Blueprint $table) {
            $table->unsignedBigInteger('sub_name_id')->nullable()->after('price_menu_id');

            $table->foreign('sub_name_id')
                ->references('id')
                ->on('price_sub_menu')
                ->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::table('price', function (Blueprint $table) {
            $table->dropForeign(['sub_name_id']);
            $table->dropColumn('sub_name_id');
        });
    }
};
