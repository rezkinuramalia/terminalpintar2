<script setup>
import { ref, onMounted } from 'vue';
import { Link } from '@inertiajs/vue3';
import axios from 'axios';

// Script ini tidak berubah.
// Kita masih mengambil data kegiatan dari API
const kegiatan = ref([]);
const isLoading = ref(true);

onMounted(async () => {
  try {
    const response = await axios.get('/api/kegiatan-terbaru');
    kegiatan.value = response.data;
  } catch (error) {
    console.error("Gagal mengambil data kegiatan:", error);
  } finally {
    isLoading.value = false;
  }
});

const formatTanggal = (dateString) => {
  if (!dateString) return '';
  const options = { year: 'numeric', month: 'long', day: 'numeric' };
  return new Date(dateString).toLocaleDateString('id-ID', options);
};
</script>

<template>
  <div class="landing-page font-sans">
    
    <header class="bg-white border-b border-gray-200 py-4 sticky top-0 z-50">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-between items-center">
        <div class="text-2xl font-bold text-[#76B340]">
          Terminal Pintar
        </div>
        
        <nav class="flex items-center space-x-6">
          <a href="#kegiatan" class="text-gray-700 font-medium hover:text-[#76B340] transition-colors">Kegiatan</a>
          <a href="#tentang" class="text-gray-700 font-medium hover:text-[#76B340] transition-colors">Tentang Kami</a>
          <a href="#kontak" class="text-gray-700 font-medium hover:text-[#76B340] transition-colors">Kontak</a>
          <Link 
            href="/login" 
            class="bg-[#76B340] text-white px-4 py-2 rounded-md text-sm font-medium hover:bg-opacity-80 transition-colors"
          >
            Login
          </Link>
        </nav>
      </div>
    </header>

    <section 
      class="hero-section bg-cover bg-center h-[500px] flex items-center text-white"
      style="background-image: url('/hero-background.jpg');"
    >
      <div class="absolute inset-0 bg-black opacity-50 h-[500px]"></div>
      
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center z-10 relative">
        <h1 class="text-5xl font-bold mb-4">
          Halo, Selamat Datang di Terminal Pintar!
        </h1>
        <p class="text-lg font-light max-w-2xl mx-auto mb-8">
          Mari bergabung bersama kami untuk berkontribusi mencerdaskan anak-anak demi mendukung
          Harapan Ibu untuk masa depan yang lebih baik
        </p>
        <a 
          href="#kegiatan"
          class="bg-[#76B340] text-white px-6 py-3 rounded-full text-base font-semibold hover:bg-opacity-80 transition-colors"
        >
          Jelajah lebih lanjut
        </a>
      </div>
    </section>

    <section id="kegiatan" class="py-20 bg-gray-50">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-bold text-center text-gray-800 mb-12">
          Dokumentasi Kegiatan Terbaru Kami
        </h2>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
          
          <div v_if="!isLoading && kegiatan.length > 0" v-for="item in kegiatan" :key="item.id" class="bg-white rounded-lg shadow-lg overflow-hidden flex flex-col">
            <img :src="item.gambar_url || 'https://via.placeholder.com/400x200'" :alt="item.judul" class="h-56 w-full object-cover">
            <div class="p-6 flex-grow">
              <h3 class="font-bold text-xl mb-2">{{ item.judul }}</h3>
              <p class="text-sm text-gray-500 mb-3">{{ formatTanggal(item.tanggal_kegiatan) }}</p>
              <p class="text-gray-700 text-base mb-4">{{ item.deskripsi_singkat }}</p>
            </div>
            <div class="p-6 pt-0">
              <a href="#" class="text-[#76B340] font-semibold hover:underline">Baca Selengkapnya</a>
            </div>
          </div>

          <div v-if="isLoading" v-for="n in 3" :key="n" class="bg-white rounded-lg shadow-lg overflow-hidden animate-pulse">
            <div class="h-56 w-full bg-gray-300"></div>
            <div class="p-6">
              <div class="h-6 bg-gray-300 rounded mb-2"></div>
              <div class="h-4 bg-gray-300 rounded w-1/2 mb-3"></div>
              <div class="h-4 bg-gray-300 rounded mb-1"></div>
              <div class="h-4 bg-gray-300 rounded mb-4"></div>
              <div class="h-5 bg-gray-300 rounded w-1/3"></div>
            </div>
          </div>

        </div>
        
        <div class="text-center mt-12">
          <a 
            href="#"
            class="bg-[#76B340] text-white px-6 py-3 rounded-full text-base font-semibold hover:bg-opacity-80 transition-colors"
          >
            Lihat semua kegiatan
          </a>
        </div>
      </div>
    </section>

    <section id="tentang" class="py-20 bg-white">
      <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-bold text-center text-gray-800 mb-12">
          Tentang Kami
        </h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-16">
          <div class="border-2 border-gray-200 p-8 rounded-lg shadow-sm">
            <h3 class="font-bold text-2xl text-[#76B340] mb-4 text-center">SEJARAH</h3>
            <p class="text-gray-700 leading-relaxed text-center">
              Dibangun pada tanggal 17 Agustus 1980 berdasarkan perintah Kaisar dari Dinasti Ming. Pada awalnya komunitas ini dibangun dengan bantuan pemulih dan kaisar selanjutnya. Hingga akhirnya setelah seratus tahun...
              </p>
          </div>
          <div class="border-2 border-gray-200 p-8 rounded-lg shadow-sm">
            <h3 class="font-bold text-2xl text-[#76B340] mb-4 text-center">VISI</h3>
            <p class="text-gray-700 leading-relaxed text-center">
              Visi yang diusung adalah menjadikan Terminal Pintar sebagai "teman perjalanan" bagi anak-anak untuk menemukan kembali arti rumah, pendidikan, dan harapan. Artinya, tempat ini tidak dimaksudkan menggantikan sekolah formal...
              </p>
          </div>
        </div>
      </div>
    </section>

    <section class="py-20 bg-gray-50">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-bold text-center text-gray-800 mb-16">
          Pengurus
        </h2>
        <div class="flex flex-wrap justify-center gap-x-16 gap-y-10">
          <div class="flex flex-col items-center text-center w-48">
            <img src="/profil-nabila.jpg" alt="Nabila Nurshani" class="w-32 h-32 rounded-full object-cover mb-4 shadow-md">
            <h4 class="font-bold text-xl text-gray-800">Nabila Nurshani</h4>
            <p class="text-gray-600">Pengurus</p>
          </div>
          <div class="flex flex-col items-center text-center w-48">
            <img src="/profil-andi.jpg" alt="Andi Rahmadi" class="w-32 h-32 rounded-full object-cover mb-4 shadow-md">
            <h4 class="font-bold text-xl text-gray-800">Andi Rahmadi</h4>
            <p class="text-gray-600">Pengurus</p>
          </div>
          <div class="flex flex-col items-center text-center w-48">
            <img src="/profil-hanifah.jpg" alt="Hanifah Ahmad" class="w-32 h-32 rounded-full object-cover mb-4 shadow-md">
            <h4 class="font-bold text-xl text-gray-800">Hanifah Ahmad</h4>
            <p class="text-gray-600">Pengurus</p>
          </div>
        </div>
      </div>
    </section>

    <section class="py-20 bg-white">
      <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-bold text-center text-gray-800 mb-12">
          Mari Berkontribusi Membangun Harapan!
        </h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
          <div class="border-2 border-dashed border-gray-300 rounded-lg p-8 text-center">
            <h3 class="font-bold text-2xl text-[#76B340] mb-3">DONASI</h3>
            <p class="text-gray-600 mb-6">Mari ikut berdonasi untuk membantu mereka yang membutuhkan...</p>
            <a 
              href="#"
              class="bg-[#76B340] text-white px-6 py-2 rounded-full text-base font-semibold hover:bg-opacity-80 transition-colors"
            >
              Lihat Cara Berdonasi
            </a>
          </div>
          <div class="border-2 border-dashed border-gray-300 rounded-lg p-8 text-center">
            <h3 class="font-bold text-2xl text-[#EB9232] mb-3">RELAWAN</h3>
            <p class="text-gray-600 mb-6">Mari ikut menjadi relawan untuk membantu mereka yang membutuhkan...</p>
            <a 
              href="#"
              class="bg-[#EB9232] text-white px-6 py-2 rounded-full text-base font-semibold hover:bg-opacity-80 transition-colors"
            >
              Lihat Cara Mendaftar
            </a>
          </div>
        </div>
      </div>
    </section>

    <footer id="kontak" class="bg-[#76B340] text-white pt-16 pb-8">
      <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-8 px-8">
        <div>
          <h4 class="font-bold text-xl mb-4">Kontak Kami</h4>
          <p class="mb-2">📞 +628123456789</p>
          <p class="mb-2">✉️ terminalpintar@gmail.com</p>
        </div>
        
        <div>
          <h4 class="font-bold text-xl mb-4">Media Sosial</h4>
          <p class="mb-2">@terminalpintar_id</p>
          <p class="mb-2">@terminalpintar</p>
          <p class="mb-2">Terminal Pintar</p>
        </div>

        <div class="flex justify-center items-start md:items-center">
          <div class="text-3xl font-bold">
            Terminal Pintar
          </div>
        </div>
      </div>
      
      <div class="mt-12 border-t border-green-700 pt-6 text-center text-sm text-green-200">
        <p>&copy; 2025 Terminal Pintar. All rights reserved.</p>
      </div>
    </footer>

  </div>
</template>

<style scoped>
/*
  Kita sengaja kosongkan <style scoped>
  karena semua styling sudah dilakukan 'inline' 
  menggunakan class Tailwind di <template>.
  Ini adalah cara kerja Tailwind.
*/
.hero-section {
  /* Kita tetap butuh ini untuk background-image */
  background-image: url('/hero-background.jpg');
}
</style>