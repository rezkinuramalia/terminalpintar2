<script setup>
import { ref, onMounted, computed } from 'vue';
import { Link, Head } from '@inertiajs/vue3';
import axios from 'axios';

const isMobileMenuOpen = ref(false);

const toggleMobileMenu = () => {
  isMobileMenuOpen.value = !isMobileMenuOpen.value;
};
const berita = ref(null);
const isLoading = ref(true);

// Fungsi untuk mengambil data detail
const fetchBeritaDetail = async () => {
    const slug = window.location.pathname.split('/').pop();
    
    isLoading.value = true;
    try {
        const response = await axios.get(`/api/berita/${slug}`);
        berita.value = response.data;
    } catch (error) {
        console.error("Gagal mengambil data detail berita:", error);
    } finally {
        isLoading.value = false;
    }
};

onMounted(() => {
    fetchBeritaDetail();
});

const formatTanggal = (dateString) => {
    if (!dateString) return '';
    const options = { year: 'numeric', month: 'long', day: 'numeric' };
    return new Date(dateString).toLocaleDateString('id-ID', options);
};

const formattedDate = computed(() => {
    return berita.value ? formatTanggal(berita.value.tanggal_publikasi) : '';
});
</script>

<template>
    <div class="font-sans bg-gray-50 min-h-screen">
        <Head v-if="berita" :title="berita.judul" />
        <Head v-else title="Memuat Berita..." />

        <header class="bg-white border-b border-gray-200 py-4 sticky top-0 z-50 shadow-sm transition-all duration-300">
    <div class="px-4 sm:px-6 lg:px-8">
      <div class="flex justify-between items-center">
        
        <Link href="/" class="flex items-center group">
          <img src="/Logo Terminal Pintar.png" alt="Logo Terminal Pintar" 
               class="h-10 w-10 mr-3 rounded-full transition-transform duration-500 group-hover:rotate-12 group-hover:scale-110">
          <span class="text-2xl font-bold text-[#76B340] tracking-tight transition-colors duration-300 group-hover:text-[#5a8a30]">
            Terminal Pintar
          </span>
        </Link>
        
        <nav class="hidden lg:flex items-center space-x-8">
          
          <Link href="/" class="relative group text-gray-600 font-medium transition-colors hover:text-[#76B340]">
            Beranda
            <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-[#76B340] transition-all duration-300 group-hover:w-full"></span>
          </Link>
          
          <Link href="/berita" class="relative group text-[#76B340] font-bold transition-colors">
            Kegiatan
            <span class="absolute -bottom-1 left-0 w-full h-0.5 bg-[#76B340]"></span>
          </Link>

          <Link href="/login" 
                class="bg-[#76B340] text-white px-6 py-2 rounded-full text-sm font-medium 
                       transform transition-all duration-300 
                       hover:bg-[#659936] hover:-translate-y-0.5 hover:shadow-lg hover:shadow-green-200 active:scale-95">
            Login
          </Link>
        </nav>

        <div class="flex lg:hidden items-center">
          <button @click="toggleMobileMenu" class="text-[#76B340] hover:text-[#659936] focus:outline-none p-2 transition-colors">
            <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path v-if="!isMobileMenuOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
              <path v-else stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>

      </div>
    </div>

    <div v-show="isMobileMenuOpen" 
         class="lg:hidden border-t border-gray-100 bg-white shadow-xl absolute w-full left-0 z-40 transform transition-all duration-300 ease-in-out">
      
      <div class="px-4 pt-4 pb-6 space-y-3">
        
        <Link href="/" @click="isMobileMenuOpen = false" 
           class="group flex items-center px-4 py-3 rounded-xl text-base font-medium text-gray-600 transition-all duration-300 
                  hover:bg-green-50 hover:text-[#76B340] hover:translate-x-2 hover:shadow-sm">
           <span class="w-1.5 h-5 bg-[#76B340] rounded-full mr-3 opacity-0 transform -translate-x-2 transition-all duration-300 group-hover:opacity-100 group-hover:translate-x-0"></span>
           Beranda
        </Link>

        <Link href="/berita" @click="isMobileMenuOpen = false" 
           class="group flex items-center px-4 py-3 rounded-xl text-base font-bold text-[#76B340] bg-green-50/50 transition-all duration-300 
                  hover:bg-green-50 hover:translate-x-2 hover:shadow-sm">
           <span class="w-1.5 h-5 bg-[#76B340] rounded-full mr-3 transform translate-x-0"></span>
           Kegiatan
        </Link>

        <div class="pt-4 px-1">
          <Link href="/login" 
                class="block w-full text-center bg-[#76B340] text-white px-4 py-3 rounded-xl text-base font-bold shadow-md 
                       transition-all duration-300
                       hover:bg-[#659936] hover:shadow-xl hover:-translate-y-1 active:scale-95">
            Login
          </Link>
        </div>

      </div>
    </div>
  </header>

        <main class="py-8 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto">
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100">
                
                <div v-if="isLoading" class="p-8 md:p-12 animate-pulse">
                    <div class="h-6 bg-gray-200 rounded w-1/4 mb-4"></div>
                    <div class="h-10 bg-gray-200 rounded w-3/4 mb-8"></div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                        <div class="h-64 bg-gray-200 rounded-xl"></div>
                        <div class="h-64 bg-gray-200 rounded-xl"></div>
                    </div>
                    <div class="space-y-3">
                        <div class="h-4 bg-gray-200 rounded w-full"></div>
                        <div class="h-4 bg-gray-200 rounded w-full"></div>
                        <div class="h-4 bg-gray-200 rounded w-5/6"></div>
                    </div>
                </div>

                <article v-if="berita" class="p-8 md:p-12">
                    
                    <div class="inline-block px-3 py-1 mb-4 text-xs font-bold tracking-wider text-[#76B340] uppercase bg-green-50 rounded-full">
                        Dokumentasi Kegiatan
                    </div>
                    
                    <h1 class="text-3xl md:text-4xl font-extrabold text-gray-900 mb-6 leading-tight">
                        {{ berita.judul }}
                    </h1>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                        <div v-for="(gambar, index) in berita.gambar_header" 
                             :key="index" 
                             class="group relative overflow-hidden rounded-xl shadow-md h-64 md:h-80 cursor-pointer">
                            
                            <img 
                                :src="gambar" 
                                alt="Foto Kegiatan" 
                                class="w-full h-full object-cover transform transition-transform duration-700 ease-in-out group-hover:scale-110"
                            >
                            
                            <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        </div>
                    </div>
                    
                    <div class="flex items-center text-sm text-gray-500 mb-8 border-b border-gray-100 pb-8">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        {{ formattedDate }}
                    </div>
                    
                    <h2 class="text-2xl font-bold text-gray-800 mb-4">
                        {{ berita.subtitle }}
                    </h2>
                    
                    <div class="prose prose-lg max-w-none text-gray-600 prose-headings:text-gray-800 prose-a:text-[#76B340] hover:prose-a:text-[#5a8a30]" v-html="berita.konten"></div>
                </article>

            </div>
        </main>

        <Link href="/berita" 
           class="fixed bottom-8 right-8 bg-white text-[#76B340] border-2 border-[#76B340] p-3 rounded-full shadow-lg z-50
                  transform transition-all duration-300
                  hover:-translate-y-1 hover:bg-[#76B340] hover:text-white hover:shadow-xl focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#76B340]">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
        </Link>
    </div>
</template>