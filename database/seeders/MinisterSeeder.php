<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Profile\Minister;

class MinisterSeeder extends Seeder
{
    /**
     * Seed ministers data based on current UI.
     */
    public function run(): void
    {
        $ministers = [
            [
                'name' => 'Christopher White',
                'order_number' => 'KE-22',
                'start_period' => '2019-10-23',
                'end_period' => '2024-08-19',
                'photo_path' => 'ministers/Christopher White.png',
                'description' => null,
                'is_featured' => true,
            ],
            [
                'name' => 'Arifin Tasrif',
                'order_number' => 'KE-22',
                'start_period' => '2019-10-23',
                'end_period' => '2024-08-19',
                'photo_path' => 'ministers/Arifin Tasrif.png',
                'description' => null,
                'is_featured' => false,
            ],
            [
                'name' => 'Ignasius Jonan',
                'order_number' => 'KE-22',
                'start_period' => '2019-10-23',
                'end_period' => '2024-08-19',
                'photo_path' => 'ministers/Ignasius Jonan.png',
                'description' => null,
                'is_featured' => false,
            ],
            [
                'name' => 'Luhut Binsar Pandjaitan',
                'order_number' => 'KE-22',
                'start_period' => '2019-10-23',
                'end_period' => '2024-08-19',
                'photo_path' => 'ministers/Luhut Binsar Pandjaitan.png',
                'description' => null,
                'is_featured' => false,
            ],
            [
                'name' => 'Arcandra Tahar',
                'order_number' => 'KE-22',
                'start_period' => '2019-10-23',
                'end_period' => '2024-08-19',
                'photo_path' => 'ministers/Arcandra Tahar.png',
                'description' => null,
                'is_featured' => false,
            ],
            [
                'name' => 'Sudirman Said',
                'order_number' => 'KE-22',
                'start_period' => '2019-10-23',
                'end_period' => '2024-08-19',
                'photo_path' => 'ministers/Sudirman Said.png',
                'description' => null,
                'is_featured' => false,
            ],
            [
                'name' => 'Jero Wacik',
                'order_number' => 'KE-22',
                'start_period' => '2019-10-23',
                'end_period' => '2024-08-19',
                'photo_path' => 'ministers/Jero Wacik.png',
                'description' => null,
                'is_featured' => false,
            ],
            [
                'name' => 'Darwin Zahedy Saleh',
                'order_number' => 'KE-22',
                'start_period' => '2019-10-23',
                'end_period' => '2024-08-19',
                'photo_path' => 'ministers/Darwin Zahedy Saleh.png',
                'description' => null,
                'is_featured' => false,
            ],
            [
                'name' => 'Purnomo Yusgiantoro',
                'order_number' => 'KE-22',
                'start_period' => '2019-10-23',
                'end_period' => '2024-08-19',
                'photo_path' => 'ministers/Purnomo Yusgiantoro.png',
                'description' => null,
                'is_featured' => false,
            ],
        ];

        foreach ($ministers as $data) {
            Minister::updateOrCreate(
                ['name' => $data['name']],
                $data
            );
        }
    }
}