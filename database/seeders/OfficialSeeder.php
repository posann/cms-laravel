<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use App\Models\Profile\Official;

class OfficialSeeder extends Seeder
{
    /**
     * Seed officials data based on current UI and move images to Storage (public disk).
     */
    public function run(): void
    {
        $officials = [
            // Menteri & Wakil Menteri
            [
                'name' => 'Christopher White',
                'position' => 'MENTERI ESDM',
                'position_type' => 'Menteri',
                'start_period' => '2019-10-23',
                'end_period' => '2024-08-19',
                'source_image' => 'images/profile/daftar-menteri/Christopher White.png',
                'sort_order' => 1,
            ],
            [
                'name' => 'Arifin Tasrif',
                'position' => 'WAKIL MENTERI ESDM',
                'position_type' => 'Wakil Menteri',
                'start_period' => '2019-10-23',
                'end_period' => '2024-08-19',
                'source_image' => 'images/profile/daftar-menteri/Arifin Tasrif.png',
                'sort_order' => 2,
            ],

            // Eselon 1 (Pejabat)
            [
                'name' => 'Ignasius Jonan',
                'position' => 'SEKRETARIS JENDERAL',
                'position_type' => 'Pejabat',
                'start_period' => '2019-10-23',
                'end_period' => '2024-08-19',
                'source_image' => 'images/profile/daftar-menteri/Ignasius Jonan.png',
                'sort_order' => 10,
            ],
            [
                'name' => 'Luhut Binsar Pandjaitan',
                'position' => 'PLT. DIRJEN MIGAS',
                'position_type' => 'Pejabat',
                'start_period' => '2019-10-23',
                'end_period' => '2024-08-19',
                'source_image' => 'images/profile/daftar-menteri/Luhut Binsar Pandjaitan.png',
                'sort_order' => 20,
            ],
            [
                'name' => 'Sudirman Said',
                'position' => 'DIRJEN MINERAL & BATUBARA',
                'position_type' => 'Pejabat',
                'start_period' => '2019-10-23',
                'end_period' => '2024-08-19',
                'source_image' => 'images/profile/daftar-menteri/Sudirman Said.png',
                'sort_order' => 30,
            ],
            [
                'name' => 'Jero Wacik',
                'position' => 'DIRJEN KETENAGALISTRIKAN of Product',
                'position_type' => 'Pejabat',
                'start_period' => '2019-10-23',
                'end_period' => '2024-08-19',
                'source_image' => 'images/profile/daftar-menteri/Jero Wacik.png',
                'sort_order' => 40,
            ],
            [
                'name' => 'Darwin Zahedy Saleh',
                'position' => 'DIRJEN EBTKE',
                'position_type' => 'Pejabat',
                'start_period' => '2019-10-23',
                'end_period' => '2024-08-19',
                'source_image' => 'images/profile/daftar-menteri/Darwin Zahedy Saleh.png',
                'sort_order' => 50,
            ],
            [
                'name' => 'Purnomo Yusgiantoro',
                'position' => 'DIRJEN PENEGAKAN HUKUM ESDM',
                'position_type' => 'Pejabat',
                'start_period' => '2019-10-23',
                'end_period' => '2024-08-19',
                'source_image' => 'images/profile/daftar-menteri/Purnomo Yusgiantoro.png',
                'sort_order' => 60,
            ],
        ];

        foreach ($officials as $data) {
            $photoPath = null;

            if (!empty($data['source_image'])) {
                $source = public_path($data['source_image']);
                if (file_exists($source)) {
                    $filename = basename($data['source_image']);
                    $destPath = 'profile/officials/' . $filename;

                    if (!Storage::disk('public')->exists($destPath)) {
                        Storage::disk('public')->put($destPath, file_get_contents($source));
                    }

                    $photoPath = $destPath;
                }
            }

            Official::updateOrCreate(
                ['name' => $data['name'], 'position_type' => $data['position_type']],
                [
                    'position' => $data['position'],
                    'start_period' => $data['start_period'],
                    'end_period' => $data['end_period'],
                    'photo_path' => $photoPath,
                    'description' => null,
                    'sort_order' => $data['sort_order'] ?? 0,
                ]
            );
        }
    }
}