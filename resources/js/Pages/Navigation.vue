<script setup>
import Bell from "./Bell.vue";
import logoTerminalPintar2 from "./Logo Terminal Pintar.png";
</script>

<template>
  <div class="relative w-[1194px] h-[53px] bg-white border border-solid border-[#e9ecef]">
    <div class="absolute top-[18px] left-[68px] w-52 [font-family:'Poppins-Bold',Helvetica] font-bold text-[#76b340] text-2xl tracking-[-0.24px] leading-6 whitespace-nowrap">
      Terminal Pintar
    </div>

    <Bell size="twenty-four" />
    <img
      class="absolute top-0 left-[18px] w-[50px] h-[50px] aspect-[1] object-cover"
      alt="Logo terminal pintar"
      :src="logoTerminalPintar2"
    />

    <button class="all-[unset] box-border absolute top-3 right-[110px] w-[61px] h-7 flex items-center justify-center bg-[#76b340] rounded-[50px] overflow-hidden">
      <div class="flex items-center justify-center -mt-px h-4 ml-0.5 w-[33px] [font-family:'Inter-SemiBold',Helvetica] font-semibold text-white text-xs text-center tracking-[0] leading-[15.6px] whitespace-nowrap">
        Login
      </div>
    </button>

    <div class="absolute top-[calc(50.00%_-_8px)] left-[calc(50.00%_+_259px)] h-4 flex items-center justify-center [font-family:'Poppins-Regular',Helvetica] font-normal text-black text-xs text-center tracking-[0] leading-[15.6px] whitespace-nowrap">
      Tentang Kami
    </div>

    <div class="absolute top-[calc(50.00%_-_8px)] left-[calc(50.00%_+_362px)] h-4 flex items-center justify-center [font-family:'Poppins-Regular',Helvetica] font-normal text-black text-xs text-center tracking-[0] leading-[15.6px] whitespace-nowrap">
      Kontak
    </div>

    <div class="absolute top-1 left-[774px] w-[73px] h-[46px] flex items-center justify-center">
      <div class="flex items-center justify-center -mt-0.5 h-4 -ml-px w-[54px] [font-family:'Poppins-Regular',Helvetica] font-normal text-black text-xs text-center tracking-[0] leading-[15.6px] whitespace-nowrap">
        Kegiatan
      </div>
    </div>
  </div>
</template>