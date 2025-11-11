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
                'judul' => 'Workshop Coding (Data Palsu)',
                'tanggal_kegiatan' => '2025-11-10',
                'deskripsi_singkat' => 'Anak-anak antusias belajar dasar...',
                'gambar_url' => 'https://via.placeholder.com/400x200?text=Kegiatan+1'
            ],
            [
                'id' => 2,
                'judul' => 'Kelas Bahasa (Data Palsu)',
                'tanggal_kegiatan' => '2025-11-09',
                'deskripsi_singkat' => 'Metode storytelling dan game...',
                'gambar_url' => 'https://via.placeholder.com/400x200?text=Kegiatan+2'
            ],
            [
                'id' => 3,
                'judul' => 'Perpustakaan Mini (Data Palsu)',
                'tanggal_kegiatan' => '2025-11-08',
                'deskripsi_singkat' => 'Menyediakan 200+ buku bacaan...',
                'gambar_url' => 'https://via.placeholder.com/400x200?text=Kegiatan+3'
            ],
        ];

        // Kembalikan data sebagai JSON
        return response()->json($dataPalsu);
    }
}