<?php
// database/seeders/NotificationSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Notification;

class NotificationSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'title'          => 'Pengumuman Jadwal Rekonsiliasi Aset Semester I 2025',
                'body'           => 'Rekonsiliasi aset daerah dijadwalkan pada tanggal 15–20 Maret 2025. Seluruh SKPD diwajibkan menyiapkan dokumen pendukung sesuai format yang telah ditetapkan. Dokumen meliputi daftar inventaris barang, berita acara penghapusan, dan laporan mutasi aset.',
                'category'       => 'pengumuman',
                'category_label' => 'Pengumuman',
                'cat_class'      => 'gold',
                'icon'           => '📢',
                'icon_bg'        => 'rgba(200,168,75,0.12)',
                'nomor'          => 'No. 900/BPKAD/2025/001',
                'tanggal'        => '2025-03-14',
                'is_read'        => false,
            ],
            [
                'title'          => 'Peraturan Bupati No. 12 Tahun 2025 tentang Pengelolaan APBD',
                'body'           => 'Telah ditetapkan Perbup terbaru terkait tata cara pengelolaan dan pertanggungjawaban APBD. Berlaku efektif mulai 1 April 2025. Seluruh OPD wajib menyesuaikan prosedur internal.',
                'category'       => 'regulasi',
                'category_label' => 'Regulasi',
                'cat_class'      => 'info',
                'icon'           => '📋',
                'icon_bg'        => '#EBF8FF',
                'nomor'          => 'Perbup No. 12/2025',
                'tanggal'        => '2025-03-10',
                'is_read'        => false,
            ],
            [
                'title'          => 'BPKAD Raih WTP Ke-7 dari BPK RI Perwakilan Sumut',
                'body'           => 'Kabupaten Serdang Bedagai kembali meraih opini Wajar Tanpa Pengecualian (WTP) dari Badan Pemeriksa Keuangan atas LKPD Tahun Anggaran 2024.',
                'category'       => 'kegiatan',
                'category_label' => 'Kegiatan',
                'cat_class'      => 'success',
                'icon'           => '🏆',
                'icon_bg'        => '#F0FFF4',
                'nomor'          => 'LHP BPK No. 05/LHP/XVIII.MDN/2025',
                'tanggal'        => '2025-03-13',
                'is_read'        => false,
            ],
            [
                'title'          => 'Bimtek Sistem Informasi Keuangan Daerah (SIKD) Batch 2',
                'body'           => 'Bimbingan teknis penggunaan aplikasi SIKD terbaru akan diselenggarakan pada 25 Maret 2025 di Aula Kantor Bupati. Peserta adalah operator keuangan dari masing-masing OPD.',
                'category'       => 'kegiatan',
                'category_label' => 'Kegiatan',
                'cat_class'      => 'warning',
                'icon'           => '📅',
                'icon_bg'        => '#FFFBEB',
                'nomor'          => 'Undangan No. 005/BPKAD/2025',
                'tanggal'        => '2025-03-11',
                'is_read'        => true,
            ],
        ];

        foreach ($data as $item) {
            Notification::create($item);
        }
    }
}