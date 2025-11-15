<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PublicInformation\Faq;

class FaqSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            [
                'question' => 'Bagaimana cara mengajukan permohonan informasi publik?',
                'answer' => "Anda dapat mengajukan permohonan informasi publik melalui formulir online pada menu 'Kontak' atau mengirimkan surat resmi ke PPID.\nPastikan mencantumkan identitas, informasi yang diminta, dan tujuan penggunaan informasi.",
            ],
            [
                'question' => 'Berapa lama waktu pemrosesan permohonan informasi?',
                'answer' => "Waktu pemrosesan permohonan informasi publik maksimal 10 hari kerja dan dapat diperpanjang 7 hari kerja sesuai peraturan perundang‑undangan.",
            ],
            [
                'question' => 'Apakah ada biaya untuk memperoleh salinan dokumen?',
                'answer' => "Pada prinsipnya tidak dipungut biaya. Namun, jika diperlukan penggandaan dokumen fisik, pemohon menanggung biaya penggandaan sesuai ketentuan yang berlaku.",
            ],
            [
                'question' => 'Bagaimana jika permohonan saya ditolak?',
                'answer' => "Anda berhak mengajukan keberatan secara tertulis kepada atasan PPID dalam jangka waktu 30 hari kerja sejak diterimanya tanggapan atau berakhirnya jangka waktu pemberian tanggapan.",
            ],
            [
                'question' => 'Di mana saya dapat mengunduh dokumen kinerja?',
                'answer' => "Dokumen kinerja tersedia pada halaman Informasi Publik » Kinerja. Anda dapat memfilter berdasarkan tahun dan kategori untuk menemukan dokumen yang relevan.",
            ],
            [
                'question' => 'Bagaimana cara menghubungi layanan pengaduan?',
                'answer' => "Silakan gunakan kanal 'Kontak' pada situs ini atau hubungi nomor layanan yang tercantum pada halaman Lokasi & Kontak untuk bantuan lebih lanjut.",
            ],
        ];

        $order = 1;
        foreach ($items as $data) {
            Faq::updateOrCreate(
                ['question' => $data['question']],
                [
                    'answer' => $data['answer'],
                    'order_column' => $order++,
                    'is_active' => true,
                ]
            );
        }
    }
}