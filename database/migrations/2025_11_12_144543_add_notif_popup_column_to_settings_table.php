<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::table('settings')->insert([
            'group' => 'sites',
            'name' => 'notification_popup', // kalau kamu ingin nama spesifik
            'locked' => 0,
            'payload' => json_encode(true),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    public function down(): void
    {
        DB::table('settings')
            ->where('group', 'sites')
            ->where('name', 'tai')
            ->delete();
    }
};
