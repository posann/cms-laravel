<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Profile\TaskFunctions;

class TaskFunctionsSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            [
                'institution_name' => 'Kementerian ESDM',
                'intro' => '<p>Berdasarkan Peraturan Presiden RI No. 68 Tahun 2015 dan Peraturan Menteri ESDM No. 15 Tahun 2021 tentang Organisasi dan Tata Kerja Kementerian Energi dan Sumber Daya Mineral (ESDM), berikut ringkasan tugas, fungsi, dan ruang lingkup.</p>',
                'tugas' => '<ul>
<li>Menyelenggarakan urusan pemerintahan di bidang energi dan sumber daya mineral untuk membantu Presiden dalam menyelenggarakan pemerintahan negara.</li>
<li>Perumusan dan penetapan kebijakan teknis serta pembinaan dan pengawasan.</li>
</ul>',
                'fungsi' => '<ul>
<li>Perumusan kebijakan di bidang minyak dan gas bumi, ketenagalistrikan, mineral dan batubara, energi baru, energi terbarukan, dan konservasi energi.</li>
<li>Pelaksanaan kebijakan, pembinaan, pengendalian, dan pengawasan di bidang ESDM.</li>
<li>Pelaksanaan penelitian dan pengembangan di bidang ESDM.</li>
</ul>',
                'ruang_lingkup' => '<p>Koordinasi nasional sektor ESDM, tata kelola, standardisasi, pembinaan teknis, serta pengawasan pelaksanaan tugas pada unit organisasi di lingkungan Kementerian ESDM.</p>',
            ],
            [
                'institution_name' => 'Sekretariat Jenderal',
                'intro' => '<p>Unit yang bertugas menyelenggarakan koordinasi pelaksanaan tugas, pembinaan, dan pemberian dukungan administrasi.</p>',
                'tugas' => '<ul>
<li>Pengelolaan perencanaan, keuangan, kepegawaian, hukum, serta ketatausahaan.</li>
<li>Koordinasi dan sinkronisasi pelaksanaan kebijakan internal.</li>
</ul>',
                'fungsi' => '<ul>
<li>Penyusunan standar prosedur layanan administrasi.</li>
<li>Fasilitasi komunikasi publik dan hubungan antar lembaga.</li>
</ul>',
                'ruang_lingkup' => '<p>Dukungan administrasi untuk seluruh unit eselon I di lingkungan Kementerian ESDM.</p>',
            ],
            [
                'institution_name' => 'Inspektorat Jenderal',
                'intro' => '<p>Melaksanakan pengawasan intern melalui audit, reviu, evaluasi, pemantauan, dan kegiatan pengawasan lainnya.</p>',
                'tugas' => '<ul>
<li>Audit kinerja dan audit kepatuhan terhadap program/anggaran.</li>
<li>Pencegahan dan penanganan tindak korupsi serta pengaduan masyarakat.</li>
</ul>',
                'fungsi' => '<ul>
<li>Penyusunan rencana pengawasan tahunan.</li>
<li>Supervisi dan pembinaan aparat pengawasan internal.</li>
</ul>',
                'ruang_lingkup' => '<p>Seluruh unit kerja di Kementerian ESDM beserta satuan kerja terkait.</p>',
            ],
            [
                'institution_name' => 'Direktorat Jenderal Minyak dan Gas Bumi',
                'intro' => '<p>Menangani perumusan dan pelaksanaan kebijakan di bidang minyak dan gas bumi.</p>',
                'tugas' => '<ul>
<li>Pengaturan, pembinaan, dan pengawasan usaha hulu dan hilir migas.</li>
<li>Perizinan, standar teknis, dan keselamatan migas.</li>
</ul>',
                'fungsi' => '<ul>
<li>Penyusunan norma, standar, prosedur, dan kriteria (NSPK) migas.</li>
<li>Fasilitasi investasi dan pengembangan infrastruktur migas.</li>
</ul>',
                'ruang_lingkup' => '<p>Sektor hulu dan hilir migas, jaringan gas kota, BBM, dan LPG.</p>',
            ],
            [
                'institution_name' => 'Direktorat Jenderal Ketenagalistrikan',
                'intro' => '<p>Fokus pada kebijakan dan pembinaan ketenagalistrikan nasional.</p>',
                'tugas' => '<ul>
<li>Perencanaan sistem ketenagalistrikan dan perizinan usaha ketenagalistrikan.</li>
<li>Pengawasan keselamatan ketenagalistrikan.</li>
</ul>',
                'fungsi' => '<ul>
<li>Penyusunan kebijakan tarif dan kualitas layanan.</li>
<li>Standarisasi peralatan dan instalasi ketenagalistrikan.</li>
</ul>',
                'ruang_lingkup' => '<p>Pembangkit, transmisi, distribusi, dan pemanfaatan tenaga listrik.</p>',
            ],
            [
                'institution_name' => 'Direktorat Jenderal Mineral dan Batubara',
                'intro' => '<p>Melaksanakan pengelolaan pertambangan mineral dan batubara.</p>',
                'tugas' => '<ul>
<li>Perizinan, pengawasan, dan pembinaan usaha pertambangan minerba.</li>
<li>Pengelolaan PNBP sektor minerba.</li>
</ul>',
                'fungsi' => '<ul>
<li>Reklamasi, pascatambang, dan konservasi mineral/batubara.</li>
<li>Pengawasan kegiatan eksplorasi dan operasi produksi.</li>
</ul>',
                'ruang_lingkup' => '<p>Hilir-hulu aktivitas pertambangan mineral dan batubara.</p>',
            ],
            [
                'institution_name' => 'Direktorat Jenderal Energi Baru, Terbarukan dan Konservasi Energi',
                'intro' => '<p>Mendorong pengembangan EBT dan penerapan konservasi energi.</p>',
                'tugas' => '<ul>
<li>Perumusan kebijakan dan fasilitasi investasi EBT.</li>
<li>Program efisiensi energi nasional dan audit energi.</li>
</ul>',
                'fungsi' => '<ul>
<li>Standarisasi, sertifikasi, dan insentif EBTKE.</li>
<li>Penguatan ekosistem riset dan teknologi EBT.</li>
</ul>',
                'ruang_lingkup' => '<p>Bioenergi, panas bumi, surya, angin, air, dan konservasi energi.</p>',
            ],
            [
                'institution_name' => 'Badan Geologi',
                'intro' => '<p>Pusat kegeologian nasional untuk mitigasi kebencanaan dan layanan geologi.</p>',
                'tugas' => '<ul>
<li>Penyelidikan dan pemetaan geologi, vulkanologi, dan gerakan tanah.</li>
<li>Layanan kewaspadaan geologi dan rekomendasi teknis.</li>
</ul>',
                'fungsi' => '<ul>
<li>Penyediaan data geologi untuk perencanaan pemanfaatan sumber daya.</li>
<li>Koordinasi tanggap darurat kebencanaan geologi.</li>
</ul>',
                'ruang_lingkup' => '<p>Geologi, geohazard, dan georesources nasional.</p>',
            ],
            [
                'institution_name' => 'Badan Pengembangan Sumber Daya Manusia ESDM',
                'intro' => '<p>Pengembangan kompetensi SDM sektor ESDM.</p>',
                'tugas' => '<ul>
<li>Pendidikan, pelatihan, dan sertifikasi kompetensi.</li>
<li>Penyusunan kurikulum dan standar kompetensi bidang ESDM.</li>
</ul>',
                'fungsi' => '<ul>
<li>Pembinaan pusat pendidikan/pelatihan dan kerja sama industri.</li>
<li>Penguatan kapasitas aparatur dan non-aparatur.</li>
</ul>',
                'ruang_lingkup' => '<p>Seluruh program pengembangan SDM di sektor ESDM.</p>',
            ],
        ];

        $order = 1;
        foreach ($items as $item) {
            TaskFunctions::updateOrCreate(
                [
                    'institution_name' => $item['institution_name'],
                    'intro' => $item['intro'],
                    'tugas' => $item['tugas'],
                    'fungsi' => $item['fungsi'],
                    'ruang_lingkup' => $item['ruang_lingkup'],
                    'order_column' => $order++,
                ]
            );
        }
    }
}