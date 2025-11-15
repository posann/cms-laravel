<div class="relative w-full h-[725px] overflow-hidden bg-gray-100">
    <div id="bannerSlider" class="relative w-full h-full">
        <div class="slider-item absolute inset-0 w-full h-full transition-opacity duration-1000 ease-in-out opacity-100">
            <div class="relative w-full h-full">
                <img src="{{ asset('images/example/Slider Item 1.png') }}" 
                     alt="Slider Image 1" 
                     class="absolute inset-0 w-full h-full object-cover">
                
                <div class="absolute inset-0 bg-black bg-opacity-30"></div>
                
                <div class="relative z-10 flex items-center h-full">
                    <div class="w-full px-4 sm:px-6 md:px-8 lg:px-12 xl:px-16 2xl:pl-20 2xl:pr-16">
                        <div class="max-w-4xl">
                            <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-4 leading-tight">
                                Selamat Datang di
                                <span class="text-primary block mt-2">Kementerian ESDM</span>
                            </h1>
                            <p class="text-lg sm:text-xl md:text-2xl text-gray-200 mb-8 max-w-2xl leading-relaxed">
                                Membangun Indonesia melalui pengelolaan energi dan sumber daya mineral yang berkelanjutan
                            </p>
                            <div class="flex flex-col sm:flex-row gap-4">
                                <button class="bg-primary hover:bg-yellow-400 text-gray-900 font-semibold px-8 py-3 rounded-lg transition-colors duration-300 text-lg">
                                    Pelajari Lebih Lanjut
                                </button>
                                <button class="border-2 border-white text-white hover:bg-white hover:text-gray-900 font-semibold px-8 py-3 rounded-lg transition-colors duration-300 text-lg">
                                    Layanan Publik
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="slider-item absolute inset-0 w-full h-full transition-opacity duration-1000 ease-in-out opacity-0">
            <div class="relative w-full h-full">
                <img src="{{ asset('images/example/Slider Item 2.png') }}" 
                     alt="Slider Image 2" 
                     class="absolute inset-0 w-full h-full object-cover">
                
                <div class="absolute inset-0 bg-black bg-opacity-30"></div>
                
                <div class="relative z-10 flex items-center h-full">
                    <div class="w-full px-4 sm:px-6 md:px-8 lg:px-12 xl:px-16 2xl:pl-20 2xl:pr-16">
                        <div class="max-w-4xl">
                            <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-4 leading-tight">
                                Inovasi Energi
                                <span class="text-primary block mt-2">Masa Depan Indonesia</span>
                            </h1>
                            <p class="text-lg sm:text-xl md:text-2xl text-gray-200 mb-8 max-w-2xl leading-relaxed">
                                Mengembangkan teknologi energi terbarukan untuk generasi mendatang
                            </p>
                            <div class="flex flex-col sm:flex-row gap-4">
                                <button class="bg-primary hover:bg-yellow-400 text-gray-900 font-semibold px-8 py-3 rounded-lg transition-colors duration-300 text-lg">
                                    Energi Terbarukan
                                </button>
                                <button class="border-2 border-white text-white hover:bg-white hover:text-gray-900 font-semibold px-8 py-3 rounded-lg transition-colors duration-300 text-lg">
                                    Program Unggulan
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <button id="prevBtn" 
            class="absolute left-4 sm:left-6 md:left-8 top-1/2 transform -translate-y-1/2 z-20 bg-white bg-opacity-20 hover:bg-opacity-30 text-white p-3 rounded-full transition-all duration-300 backdrop-blur-sm">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
        </svg>
    </button>
    
    <button id="nextBtn" 
            class="absolute right-4 sm:right-6 md:right-8 top-1/2 transform -translate-y-1/2 z-20 bg-white bg-opacity-20 hover:bg-opacity-30 text-white p-3 rounded-full transition-all duration-300 backdrop-blur-sm">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
        </svg>
    </button>

    <div class="absolute bottom-6 left-1/2 transform -translate-x-1/2 z-20">
        <div class="flex space-x-3">
            <button class="dot w-3 h-3 rounded-full bg-white opacity-100 transition-opacity duration-300" data-slide="0"></button>
            <button class="dot w-3 h-3 rounded-full bg-white opacity-50 transition-opacity duration-300" data-slide="1"></button>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const slides = document.querySelectorAll('.slider-item');
        const dots = document.querySelectorAll('.dot');
        const prevBtn = document.getElementById('prevBtn');
        const nextBtn = document.getElementById('nextBtn');
        let currentSlide = 0;
        const totalSlides = slides.length;
        let autoSlideInterval;

        function showSlide(index) {
            slides.forEach(slide => {
                slide.classList.remove('opacity-100');
                slide.classList.add('opacity-0');
            });
            
            slides[index].classList.remove('opacity-0');
            slides[index].classList.add('opacity-100');
            
            dots.forEach(dot => {
                dot.classList.remove('opacity-100');
                dot.classList.add('opacity-50');
            });
            dots[index].classList.remove('opacity-50');
            dots[index].classList.add('opacity-100');
            
            currentSlide = index;
        }

        function nextSlide() {
            const next = (currentSlide + 1) % totalSlides;
            showSlide(next);
        }

        function prevSlide() {
            const prev = (currentSlide - 1 + totalSlides) % totalSlides;
            showSlide(prev);
        }

        function startAutoSlide() {
            autoSlideInterval = setInterval(nextSlide, 5000);
        }

        function stopAutoSlide() {
            clearInterval(autoSlideInterval);
        }

        nextBtn.addEventListener('click', () => {
            stopAutoSlide();
            nextSlide();
            startAutoSlide();
        });

        prevBtn.addEventListener('click', () => {
            stopAutoSlide();
            prevSlide();
            startAutoSlide();
        });

        dots.forEach((dot, index) => {
            dot.addEventListener('click', () => {
                stopAutoSlide();
                showSlide(index);
                startAutoSlide();
            });
        });

        const bannerSlider = document.getElementById('bannerSlider');
        bannerSlider.addEventListener('mouseenter', stopAutoSlide);
        bannerSlider.addEventListener('mouseleave', startAutoSlide);

        startAutoSlide();
    });
</script>