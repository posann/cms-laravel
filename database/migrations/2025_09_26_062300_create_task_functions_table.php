<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tugas_fungsis', function (Blueprint $table) {
            $table->id();
            $table->string('institution_name');
            $table->longText('intro')->nullable();
            $table->longText('tugas')->nullable();
            $table->longText('fungsi')->nullable();
            $table->longText('ruang_lingkup')->nullable();
            $table->integer('order_column')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('task_functions');
    }
};