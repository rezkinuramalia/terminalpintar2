<script setup>
import buket1 from "./dokumentasi.jpg";
</script>

<template>
  <div class="relative w-[280px] h-[338px] bg-white rounded-3xl overflow-hidden border-2 border-solid border-[#e6e6e6]">
    <div class="absolute left-[23px] bottom-[156px] [font-family:'Poppins-Medium',Helvetica] font-medium text-black text-sm tracking-[0] leading-[18.2px] whitespace-nowrap">
      Workshop Coding untuk Anak
    </div>

    <div class="absolute left-[23px] bottom-[129px] [font-family:'Poppins-Regular',Helvetica] font-normal text-[#6d6d6dbf] text-xs tracking-[0] leading-[18px] whitespace-nowrap">
      15 Desember 2025
    </div>

    <p class="absolute left-[23px] bottom-[66px] w-[251px] [font-family:'Poppins-Medium',Helvetica] font-medium text-[#6d6d6dbf] text-xs tracking-[0] leading-[18px]">
      Anak-anak belajar dasar-dasar programming dengan cara yang menyenangkan
    </p>

    <img
      class="absolute w-full h-[calc(100%_-_195px)] top-0 left-0 object-cover"
      alt="Buket"
      :src="buket1"
    />

    <div class="absolute top-[281px] right-[109px] w-[148px] h-7 flex items-center justify-center bg-white rounded-[5px] overflow-hidden border border-solid border-[#76b340]">
      <div class="flex items-center justify-center h-4 w-[122px] [font-family:'Poppins-Medium',Helvetica] font-medium text-[#76b340] text-xs text-center tracking-[0] leading-[15.6px] whitespace-nowrap">
        Baca Selengkapnya
      </div>
    </div>
  </div>
</template>