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
        // Tabel untuk Daftar Menteri
        Schema::create('ministers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('order_number'); // contoh: "KE-22"
            $table->date('start_period');
            $table->date('end_period');
            $table->string('photo_path')->nullable();
            $table->text('description')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->timestamps();
            $table->softDeletes();
        });

        // Tabel untuk Daftar Pejabat Eselon 1
        Schema::create('officials', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('position'); // contoh: "MENTERI ESDM", "WAKIL MENTERI ESDM", "SEKRETARIS JENDERAL", dll
            $table->string('position_type'); // contoh: "MENTERI", "WAKIL MENTERI", "ESELON 1"
            $table->date('start_period');
            $table->date('end_period');
            $table->string('photo_path')->nullable();
            $table->text('description')->nullable();
            $table->integer('sort_order')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });

        // Tabel untuk Makna Logo
        Schema::create('logo_meanings', function (Blueprint $table) {
            $table->id();
            $table->text('description');
            $table->text('meanings');
            $table->string('logo_path');
            $table->timestamps();
        });

        // Tabel untuk Sejarah (Timeline)
        Schema::create('history_timelines', function (Blueprint $table) {
            $table->id();
            $table->string('year');
            $table->text('description');
            $table->timestamps();
            $table->softDeletes();
        });

        // Tabel untuk Struktur Organisasi
        Schema::create('organization_structures', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->string('image_path')->nullable();
            $table->timestamps();
        });

        // Tabel untuk Visi Misi
        Schema::create('vision_missions', function (Blueprint $table) {
            $table->id();
            $table->longText('vision');
            $table->longText('mission');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vision_missions');
        Schema::dropIfExists('organization_structures');
        Schema::dropIfExists('history_timelines');
        Schema::dropIfExists('logo_meaning_details');
        Schema::dropIfExists('logo_meanings');
        Schema::dropIfExists('officials');
        Schema::dropIfExists('ministers');
    }
};
