<section class="relative w-full">
    <div
        class="relative w-full h-[60vh] sm:h-[70vh] md:h-[80vh] lg:max-h-[700px] xl:max-h-[800px] 2xl:max-h-[900px] overflow-hidden">
        <div id="heroSlider" class="relative w-full h-full">
            <div
                class="hero-slide absolute inset-0 w-full h-full transition-opacity duration-1000 ease-in-out opacity-100">
                <img src="{{ asset('images/example/Slider Item 1.png') }}" alt="Hero Background 1"
                    class="absolute inset-0 w-full h-full object-cover">

                <div class="absolute inset-0 bg-black bg-opacity-40"></div>

                <div class="relative z-10 flex top-[15%] max-sm:top-[15%] h-full">
                    <div class="w-full px-4 sm:px-6 md:px-8 lg:px-12 xl:px-16 2xl:px-20">
                        <div class="max-w-4xl">
                            <h1
                                class="text-xl sm:text-2xl md:text-3xl lg:text-4xl xl:text-5xl/[120%] font-roboto font-bold text-primary-700 mb-4 sm:mb-6 leading-tight max-sm:text-base">
                                Status Gunung Dieng Naik ke Level Waspada, Badan Geologi Imbau Kewaspadaan Masyarakat
                            </h1>


                            <div class="mt-4 sm:mt-8">
                                <button
                                    class="inline-flex items-center bg-primary-700 hover:bg-primary-600 text-black font-semibold px-4 sm:px-6 py-2 sm:py-3 rounded-full transition-colors duration-300 text-sm md:text-base">
                                    Selengkapnya
                                    <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div
                class="hero-slide absolute inset-0 w-full h-full transition-opacity duration-1000 ease-in-out opacity-0">

                <img src="{{ asset('images/example/Slider Item 2.png') }}" alt="Hero Background 2"
                    class="absolute inset-0 w-full h-full object-cover">

                <div class="absolute inset-0 bg-black bg-opacity-40"></div>

                <div class="relative z-10 flex h-full top-[15%] max-sm:top-[15%]">
                    <div class="w-full px-4 sm:px-6 md:px-8 lg:px-12 xl:px-16 2xl:px-20">
                        <div class="max-w-4xl">
                            <h1
                                class="text-xl sm:text-2xl md:text-3xl lg:text-4xl xl:text-5xl/[120%] font-roboto font-bold text-primary-700 mb-4 sm:mb-6 leading-tight max-sm:text-base">
                                Menteri Bahlil Tekankan Hilirisasi Harus Berkelanjutan untuk Kemajuan Indonesia
                            </h1>


                            <div class="mt-4 sm:mt-8">
                                <button
                                    class="inline-flex items-center bg-primary-700 hover:bg-primary-600 text-black font-semibold px-4 sm:px-6 py-2 sm:py-3 rounded-full transition-colors duration-300 text-sm md:text-base">
                                    Pelajari Lebih Lanjut
                                    <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div
            class="absolute bottom-16 sm:bottom-20 md:bottom-24 right-4 sm:right-6 md:right-8 lg:right-12 xl:right-16 2xl:right-20 z-20">
            <div class="flex space-x-2 sm:space-x-3 md:mb-[100px]">
                <button class="hero-dot w-3 h-3 rounded-full bg-white opacity-100 transition-opacity duration-300"
                    data-slide="0"></button>
                <button class="hero-dot w-3 h-3 rounded-full bg-white opacity-50 transition-opacity duration-300"
                    data-slide="1"></button>
            </div>
        </div>


        <div class="absolute bottom-0 left-0 right-0 z-30">
            <div class="text-white py-6 sm:py-8 md:py-12">
                <div class="px-4 sm:px-6 md:px-8 lg:px-12 xl:px-16 2xl:px-20">

                    <h2 class="text-lg sm:text-xl md:text-2xl font-bold text-white mb-3 sm:mb-4">Berita Terkini</h2>


                    <div class="w-full border-t border-gray-300 mb-4 sm:mb-6"></div>


                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6 lg:gap-8">

                        <div class="flex gap-3 sm:gap-4">
                            <div
                                class="flex-shrink-0 w-16 h-12 sm:w-20 sm:h-16 md:w-24 md:h-16 lg:w-[120px] lg:h-[90px] overflow-hidden rounded-lg">
                                <img src="{{ asset('images/example/Slider Item 1.png') }}" alt="News 1"
                                    class="w-full h-full object-cover">
                            </div>
                            <div class="flex-1 min-w-0">
                                <h3 class="text-xs sm:text-sm md:text-base font-semibold text-white mb-1 line-clamp-2">
                                    Menteri Bahlil Tekankan Hilirisasi Harus Berkelanjutan
                                </h3>
                                <p class="text-xs text-gray-100">
                                    SENIN, 30 JUNI 2025
                                </p>
                            </div>
                        </div>


                        <div class="flex gap-3 sm:gap-4">
                            <div
                                class="flex-shrink-0 w-16 h-12 sm:w-20 sm:h-16 md:w-24 md:h-16 lg:w-[120px] lg:h-[90px] overflow-hidden rounded-lg">
                                <img src="{{ asset('images/example/Slider Item 2.png') }}" alt="News 2"
                                    class="w-full h-full object-cover">
                            </div>
                            <div class="flex-1 min-w-0">
                                <h3 class="text-xs sm:text-sm md:text-base font-semibold text-white mb-1 line-clamp-2">
                                    Pemerintah Tangani Sumur Minyak Masyarakat, Menteri Bahlil: Tata Kelola Diperbaiki
                                </h3>
                                <p class="text-xs text-gray-100">
                                    SENIN, 30 JUNI 2025
                                </p>
                            </div>
                        </div>


                        <div class="flex gap-3 sm:gap-4">
                            <div
                                class="flex-shrink-0 w-16 h-12 sm:w-20 sm:h-16 md:w-24 md:h-16 lg:w-[120px] lg:h-[90px] overflow-hidden rounded-lg">
                                <img src="{{ asset('images/example/Slider Item 1.png') }}" alt="News 3"
                                    class="w-full h-full object-cover">
                            </div>
                            <div class="flex-1 min-w-0">
                                <h3 class="text-xs sm:text-sm md:text-base font-semibold text-white mb-1 line-clamp-2">
                                    Implementasi Biodiesel Dorong Swasembada Energi, Hemat Devisa, dan Ciptakan Jutaan
                                    Lapangan Kerja
                                </h3>
                                <p class="text-xs text-gray-100">
                                    SENIN, 30 JUNI 2025
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const heroSlides = document.querySelectorAll('.hero-slide');
        const heroDots = document.querySelectorAll('.hero-dot');
        const heroPrevBtn = document.getElementById('heroPrevBtn');
        const heroNextBtn = document.getElementById('heroNextBtn');
        let currentHeroSlide = 0;
        const totalHeroSlides = heroSlides.length;
        let heroAutoSlideInterval;

        // Function to show specific hero slide
        function showHeroSlide(index) {
            // Hide all slides
            heroSlides.forEach(slide => {
                slide.classList.remove('opacity-100');
                slide.classList.add('opacity-0');
            });

            // Show current slide
            heroSlides[index].classList.remove('opacity-0');
            heroSlides[index].classList.add('opacity-100');

            // Update dots
            heroDots.forEach(dot => {
                dot.classList.remove('opacity-100');
                dot.classList.add('opacity-50');
            });
            heroDots[index].classList.remove('opacity-50');
            heroDots[index].classList.add('opacity-100');

            currentHeroSlide = index;
        }

        // Function to go to next hero slide
        function nextHeroSlide() {
            const next = (currentHeroSlide + 1) % totalHeroSlides;
            showHeroSlide(next);
        }

        // Function to go to previous hero slide
        function prevHeroSlide() {
            const prev = (currentHeroSlide - 1 + totalHeroSlides) % totalHeroSlides;
            showHeroSlide(prev);
        }

        // Auto slide function for hero
        function startHeroAutoSlide() {
            heroAutoSlideInterval = setInterval(nextHeroSlide, 6000); // Change slide every 6 seconds
        }

        // Stop auto slide for hero
        function stopHeroAutoSlide() {
            clearInterval(heroAutoSlideInterval);
        }

        // Event listeners for hero slider
        if (heroNextBtn) {
            heroNextBtn.addEventListener('click', () => {
                stopHeroAutoSlide();
                nextHeroSlide();
                startHeroAutoSlide();
            });
        }

        if (heroPrevBtn) {
            heroPrevBtn.addEventListener('click', () => {
                stopHeroAutoSlide();
                prevHeroSlide();
                startHeroAutoSlide();
            });
        }

        // Dots click event for hero
        heroDots.forEach((dot, index) => {
            dot.addEventListener('click', () => {
                stopHeroAutoSlide();
                showHeroSlide(index);
                startHeroAutoSlide();
            });
        });

        // Pause auto slide on hover for hero
        const heroSlider = document.getElementById('heroSlider');
        if (heroSlider) {
            heroSlider.addEventListener('mouseenter', stopHeroAutoSlide);
            heroSlider.addEventListener('mouseleave', startHeroAutoSlide);
        }

        // Initialize hero auto slide
        startHeroAutoSlide();
    });
</script>
