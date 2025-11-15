<div class="bg-primary-700 h-7 sm:h-8 md:h-9 lg:max-h-[38px] overflow-hidden relative">
    <div class="flex items-center h-full">
        <div class="bg-neutral-900 text-white px-2 sm:px-3 md:px-4 py-1 sm:py-1.5 md:py-2 text-[10px] sm:text-xs md:text-sm font-semibold flex-shrink-0 h-full flex items-center">
            <span class="text-primary-700">INFORMASI</span>
        </div>
        
        <div class="flex-1 overflow-hidden relative h-full">
            <div class="scrolling-text flex items-center h-full px-1.5 sm:px-2 md:px-4 text-black font-medium text-[10px] sm:text-xs md:text-sm whitespace-nowrap">
                <span class="inline-block">
                    Reviu Informasi Strategis (Okt-Des 2024)
                    <span class="mx-2 sm:mx-4 md:mx-8">•</span>
                    Pengumuman Hasil Seleksi CPNS Kementerian ESDM 2024
                    <span class="mx-2 sm:mx-4 md:mx-8">•</span>
                    Informasi Terkini Kebijakan Energi Terbarukan
                    <span class="mx-2 sm:mx-4 md:mx-8">•</span>
                    Reviu Informasi Strategis (Okt-Des 2024)
                </span>
            </div>
        </div>
        <div class="bg-neutral-900 text-white px-2 sm:px-3 md:px-4 py-1 sm:py-1.5 md:py-2 text-[10px] sm:text-xs md:text-sm font-semibold flex-shrink-0 h-full flex items-center">
            <span class="flex items-center gap-1 sm:gap-1.5 md:gap-2">
                <svg class="w-2.5 h-2.5 sm:w-3 sm:h-3 md:w-4 md:h-4 text-primary-700" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"></path>
                </svg>
                <span class="text-primary-700">INFO 136</span>
            </span>
        </div>
    </div>
</div>

<style>
    .scrolling-text {
        animation: scroll-left 30s linear infinite;
    }
    
    @keyframes scroll-left {
        0% {
            transform: translateX(100%);
        }
        100% {
            transform: translateX(-100%);
        }
    }
    
    /* Pause animation on hover */
    .scrolling-text:hover {
        animation-play-state: paused;
    }
    
    /* Adjust animation speed for smaller screens */
    @media (max-width: 640px) {
        .scrolling-text {
            animation-duration: 20s;
        }
    }
</style>