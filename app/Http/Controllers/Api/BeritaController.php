<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// Kita butuh Model 'Berita' untuk ambil data, tapi kita belum buat.
// Untuk SEKARANG, kita pakai data palsu (dummy) saja.
// use App\Models\Berita;

class BeritaController extends Controller
{
    /**
     * Sediakan data kegiatan terbaru untuk LandingPage.
     */
    public function getKegiatanTerbaru()
    {
        // TODO: Ganti ini dengan data dari database nanti.
        $dataPalsu = [
            [
                'id' => 1,
                'judul' => 'Workshop Coding untuk Anak',
                'tanggal_kegiatan' => '2025-11-10',
                'deskripsi_singkat' => 'Anak-anak belajar dasar-dasar programming dengan cara yang menyenangkan',
                'gambar_url' => 'https://via.placeholder.com/400x200?text=Kegiatan+1'
            ],
            [
                'id' => 2,
                'judul' => 'Kelas Bahasa Interaktif',
                'tanggal_kegiatan' => '2025-11-09',
                'deskripsi_singkat' => 'Sesi pembelajaran bahasa inggris dengan metode storytelling dan games',
                'gambar_url' => 'https://via.placeholder.com/400x200?text=Kegiatan+2'
            ],
            [
                'id' => 3,
                'judul' => 'Perpustakaan Mini Kini Dibuka',
                'tanggal_kegiatan' => '2025-11-08',
                'deskripsi_singkat' => 'Terminal Pintar kini memiliki perpustakaan mini dengan 200+ buku untuk anak-anak',
                'gambar_url' => 'https://via.placeholder.com/400x200?text=Kegiatan+3'
            ],
        ];

        // Kembalikan data sebagai JSON
        return response()->json($dataPalsu);
    }
}