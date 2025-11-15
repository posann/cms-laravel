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
        // Table price_menu
        Schema::create('price_menu', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->boolean('status')->default(1); // aktif/inaktif
            $table->timestamps();
        });

        // Table price
        Schema::create('price', function (Blueprint $table) {
            $table->id();
            $table->foreignId('price_menu_id')->constrained('price_menu')->onDelete('cascade');
            $table->string('name');
            $table->date('date_period'); // periode harga
            $table->decimal('price', 15, 2);
            $table->boolean('status')->default(1); // aktif/inaktif
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('price');
        Schema::dropIfExists('price_menu');
    }
};
