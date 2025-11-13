<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Profile\HistoryTimeline;

class HistoryTimelineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $timelineData = [
            [
                'year' => '1945',
                'description' => 'Lembaga pertama yang menangani Pertambangan di Indonesia adalah Jawatan Tambang dan Geologi yang dibentuk pada tanggal 11 September 1945. Jawatan ini semula bernama Chisutsu Chosajo, bernaung di bawah Kementerian Kemakmuran.'
            ],
            [
                'year' => '1952',
                'description' => 'Jawatan Tambang dan Geologi yang pada saat itu berada di Kementerian Perindustrian, berdasarkan SK Menteri Perekonomian No. 2360a/M Tahun 1952, diubah menjadi Direktorat Pertambangan yang terdiri atas Pusat Jawatan Pertambangan dan Pusat Jawatan Geologi.'
            ],
            [
                'year' => '1957',
                'description' => 'Berdasarkan Keppres No.131 Tahun 1957, Kementerian Perekonomian dipecah menjadi Kementerian Perdagangan dan Kementerian Perindustrian. Berdasarkan SK Menteri Perindustrian No. 4247 a/M tahun 1957, Pusat-pusat dibawah Direktorat Pertambangan berubah menjadi Jawatan Pertambangan dan Jawatan Geologi.'
            ],
            [
                'year' => '1959',
                'description' => 'Kementerian Perindustrian dipecah menjadi Departemen Perindustrian Dasar/Pertambangan dan Departemen Perindustrian Rakyat dimana bidang pertambangan minyak dan gas bumi berada dibawah Departemen Perindustrian Dasar dan Pertambangan.'
            ],
            [
                'year' => '1961',
                'description' => 'Pemerintah membentuk Biro Minyak dan Gas Bumi yang berada dibawah Departemen Perindustrian Dasar dan Pertambangan.'
            ],
            [
                'year' => '1962',
                'description' => 'Jawatan Geologi dan Jawatan Pertambangan diubah menjadi Direktorat Geologi dan Direktorat Pertambangan.'
            ],
            [
                'year' => '1963',
                'description' => 'Biro Minyak dan Gas Bumi diubah menjadi Direktorat Minyak dan Gas Bumi yang berada dibawah kewenangan Pembantu Menteri Urusan Pertambangan dan Perusahaan-perusahaan Tambang Negara.'
            ],
            [
                'year' => '1965',
                'description' => 'Departemen Perindustrian Dasar/Pertambangan dipecah menjadi tiga departemen yaitu: Departemen Perindustrian Dasar, Departemen Pertambangan dan Departemen Urusan Minyak dan Gas Bumi.'
            ],
            [
                'year' => '11 Juni 1965',
                'description' => 'Menteri Urusan Minyak dan Gas Bumi menetapkan berdirinya Lembaga Minyak dan Gas Bumi (Lemigas).'
            ],
            [
                'year' => '1966',
                'description' => 'Dalam Kabinet Ampera, Departemen Minyak dan Gas Bumi dan Departemen Pertambangan dilebur menjadi Departemen Pertambangan.'
            ],
            [
                'year' => '1978',
                'description' => 'Departemen Pertambangan berubah menjadi Departemen Pertambangan dan Energi.'
            ],
            [
                'year' => '2000',
                'description' => 'Departemen Pertambangan dan Energi berubah menjadi Departemen Energi dan Sumber Daya Mineral.'
            ],
            [
                'year' => '2009',
                'description' => 'Sesuai Perpres 47/2009, nama "Departemen" diubah menjadi "Kementerian" yang memiliki tugas dan fungsi menyelenggarakan urusan pemerintahan di bidang energi dan sumber daya mineral untuk membantu Presiden dalam menyelenggarakan pemerintahan negara.'
            ]
        ];

        foreach ($timelineData as $data) {
            HistoryTimeline::create($data);
        }
    }
}