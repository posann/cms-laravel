<x-public.main>

    <section class="py-8 md:py-10 lg:py-12">
        <div class="px-4 sm:px-6 md:px-8 lg:px-12 xl:px-16 2xl:px-20">
            <div class="mb-8 gap-4 items-center justify-start flex flex-row">
                <strong class="text-sm">Beranda</strong>
                <span>&#9679;</span>
                <strong class="text-sm">Profil</strong>
                <span>&#9679;</span>
                <span class="text-sm">Daftar Menteri</span>
            </div>

            <div class="flex items-center justify-between mb-8">
                <div>
                    <h2 class="text-xl md:text-3xl lg:text-4xl font-bold text-gray-900 font-roboto">Daftar Menteri</h2>
                    <h4 class="md:text-lg text-sm font-semibold text-gray-600 font-roboto">Kementerian Energi dan Sumber Daya Mineral telah berdiri sejak 11 September 1945. Pada awal mulanya lembaga ini merupakan lembaga yang pertama kali menangani Pertambangan di Indonesia. Lembaga ini disebut sebagai Jawatan Tambang dan Geologi. Jawatan ini, semula bernama Chisitsu Chosajo, bernaung di Kementerian Kemakmuran. Menteri yang pertama kali menjabat adalah Ir. Surachman Tjokroadi.</h4>
                </div>
            </div>

            <!-- Kartu unggulan (terpusat) -->
            <div class="flex justify-center mb-4 md:mb-6 xl:mb-12 2xl:mb-16">
                <div class="bg-gray-100 max-w-sm w-full rounded-2xl overflow-hidden shadow-sm transition-all duration-300 group flex flex-col cursor-pointer">
                    <div class="relative overflow-hidden">
                        <img src="{{ asset('images/profile/daftar-menteri/Christopher White.png') }}" alt="Christopher White" class="w-full h-full object-contain transition-transform duration-500">
                    </div>
                    <div class="p-6 pb-4 flex flex-col flex-1">
                        <h3 class="text-base sm:text-lg font-bold text-gray-900 leading-snug font-roboto group-hover:text-black">Christopher White</h3>
                        <span class="inline-block mt-1 bg-neutral-800 text-white text-xs font-bold px-4 py-1 rounded font-roboto w-fit">KE-22</span>
                        <p class="mt-2 text-sm text-gray-600 font-roboto">23 Oktober 2019 - 19 Agustus 2024</p>
                        <div class="w-full h-px bg-gray-200 my-2 group-hover:bg-black transition-colors duration-300"></div>
                        <div class="flex items-center justify-between text-xs sm:text-sm text-gray-600 group-hover:text-black">
                            <span class="font-roboto font-medium">LIHAT PROFIL</span>
                            <div class="flex items-center justify-center rounded-md group-hover:bg-black w-7 h-7 sm:w-8 sm:h-8 transition-colors duration-300">
                                <svg class="w-4 h-4 text-black group-hover:text-white transition-colors duration-300" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Grid kartu lainnya: mobile 2 kolom, md 3, lg 4 -->
            <div class="grid grid-cols-2 gap-4 sm:gap-6 xl:gap-12 md:grid-cols-3 lg:grid-cols-4">
                <!-- Arifin Tasrif -->
                <div class="bg-gray-100 max-w-sm rounded-2xl overflow-hidden shadow-sm transition-all duration-300 group flex flex-col cursor-pointer">
                    <div class="relative overflow-hidden">
                        <img src="{{ asset('images/profile/daftar-menteri/Arifin Tasrif.png') }}" alt="Arifin Tasrif" class="w-full h-full transition-transform duration-500">
                    </div>
                    <div class="p-6 pb-4 flex flex-col flex-1">
                        <h3 class="text-base sm:text-lg font-bold text-gray-900 leading-snug font-roboto group-hover:text-black">Arifin Tasrif</h3>
                        <span class="inline-block mt-1 bg-neutral-800 text-white text-xs font-bold px-4 py-1 rounded font-roboto w-fit">KE-22</span>
                        <p class="mt-2 text-sm text-gray-600 font-roboto max-sm:mb-4">23 Oktober 2019 - 19 Agustus 2024</p>
                        <div class="w-full h-px bg-gray-200 my-2 group-hover:bg-black transition-colors duration-300"></div>
                        <div class="flex items-center justify-between text-xs sm:text-sm text-gray-600 group-hover:text-black">
                            <span class="font-roboto font-medium">LIHAT PROFIL</span>
                            <div class="flex items-center justify-center rounded-md group-hover:bg-black w-7 h-7 sm:w-8 sm:h-8 transition-colors duration-300">
                                <svg class="w-4 h-4 text-black group-hover:text-white transition-colors duration-300" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Ignasius Jonan -->
                <div class="bg-gray-100 max-w-sm rounded-2xl overflow-hidden shadow-sm transition-all duration-300 group flex flex-col cursor-pointer">
                    <div class="relative overflow-hidden">
                        <img src="{{ asset('images/profile/daftar-menteri/Ignasius Jonan.png') }}" alt="Ignasius Jonan" class="w-full h-full transition-transform duration-500">
                    </div>
                    <div class="p-6 pb-4 flex flex-col flex-1">
                        <h3 class="text-base sm:text-lg font-bold text-gray-900 leading-snug font-roboto group-hover:text-black">Ignasius Jonan</h3>
                        <span class="inline-block mt-1 bg-neutral-800 text-white text-xs font-bold px-4 py-1 rounded font-roboto w-fit">KE-22</span>
                        <p class="mt-2 text-sm text-gray-600 font-roboto max-sm:mb-4">23 Oktober 2019 - 19 Agustus 2024</p>
                        <div class="w-full h-px bg-gray-200 my-2 group-hover:bg-black transition-colors duration-300"></div>
                        <div class="flex items-center justify-between text-xs sm:text-sm text-gray-600 group-hover:text-black">
                            <span class="font-roboto font-medium">LIHAT PROFIL</span>
                            <div class="flex items-center justify-center rounded-md group-hover:bg-black w-7 h-7 sm:w-8 sm:h-8 transition-colors duration-300">
                                <svg class="w-4 h-4 text-black group-hover:text-white transition-colors duration-300" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Luhut Binsar Pandjaitan -->
                <div class="bg-gray-100 max-w-sm rounded-2xl overflow-hidden shadow-sm transition-all duration-300 group flex flex-col cursor-pointer">
                    <div class="relative overflow-hidden">
                        <img src="{{ asset('images/profile/daftar-menteri/Luhut Binsar Pandjaitan.png') }}" alt="Luhut Binsar Pandjaitan" class="w-full h-full transition-transform duration-500">
                    </div>
                    <div class="p-6 pb-4 flex flex-col flex-1">
                        <h3 class="text-base sm:text-lg font-bold text-gray-900 leading-snug font-roboto group-hover:text-black">Luhut Binsar Pandjaitan</h3>
                        <span class="inline-block mt-1 bg-neutral-800 text-white text-xs font-bold px-4 py-1 rounded font-roboto w-fit">KE-22</span>
                        <p class="mt-2 text-sm text-gray-600 font-roboto max-sm:mb-4">23 Oktober 2019 - 19 Agustus 2024</p>
                        <div class="w-full h-px bg-gray-200 my-2 group-hover:bg-black transition-colors duration-300"></div>
                        <div class="flex items-center justify-between text-xs sm:text-sm text-gray-600 group-hover:text-black">
                            <span class="font-roboto font-medium">LIHAT PROFIL</span>
                            <div class="flex items-center justify-center rounded-md group-hover:bg-black w-7 h-7 sm:w-8 sm:h-8 transition-colors duration-300">
                                <svg class="w-4 h-4 text-black group-hover:text-white transition-colors duration-300" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Arcandra Tahar -->
                <div class="bg-gray-100 max-w-sm rounded-2xl overflow-hidden shadow-sm transition-all duration-300 group flex flex-col cursor-pointer">
                    <div class="relative overflow-hidden">
                        <img src="{{ asset('images/profile/daftar-menteri/Arcandra Tahar.png') }}" alt="Arcandra Tahar" class="w-full h-full transition-transform duration-500">
                    </div>
                    <div class="p-6 pb-4 flex flex-col flex-1">
                        <h3 class="text-base sm:text-lg font-bold text-gray-900 leading-snug font-roboto group-hover:text-black">Arcandra Tahar</h3>
                        <span class="inline-block mt-1 bg-neutral-800 text-white text-xs font-bold px-4 py-1 rounded font-roboto w-fit">KE-22</span>
                        <p class="mt-2 text-sm text-gray-600 font-roboto max-sm:mb-4">23 Oktober 2019 - 19 Agustus 2024</p>
                        <div class="w-full h-px bg-gray-200 my-2 group-hover:bg-black transition-colors duration-300"></div>
                        <div class="flex items-center justify-between text-xs sm:text-sm text-gray-600 group-hover:text-black">
                            <span class="font-roboto font-medium">LIHAT PROFIL</span>
                            <div class="flex items-center justify-center rounded-md group-hover:bg-black w-7 h-7 sm:w-8 sm:h-8 transition-colors duration-300">
                                <svg class="w-4 h-4 text-black group-hover:text-white transition-colors duration-300" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sudirman Said -->
                <div class="bg-gray-100 max-w-sm rounded-2xl overflow-hidden shadow-sm transition-all duration-300 group flex flex-col cursor-pointer">
                    <div class="relative overflow-hidden">
                        <img src="{{ asset('images/profile/daftar-menteri/Sudirman Said.png') }}" alt="Sudirman Said" class="w-full h-full transition-transform duration-500">
                    </div>
                    <div class="p-6 pb-4 flex flex-col flex-1">
                        <h3 class="text-base sm:text-lg font-bold text-gray-900 leading-snug font-roboto group-hover:text-black">Sudirman Said</h3>
                        <span class="inline-block mt-1 bg-neutral-800 text-white text-xs font-bold px-4 py-1 rounded font-roboto w-fit">KE-22</span>
                        <p class="mt-2 text-sm text-gray-600 font-roboto max-sm:mb-4">23 Oktober 2019 - 19 Agustus 2024</p>
                        <div class="w-full h-px bg-gray-200 my-2 group-hover:bg-black transition-colors duration-300"></div>
                        <div class="flex items-center justify-between text-xs sm:text-sm text-gray-600 group-hover:text-black">
                            <span class="font-roboto font-medium">LIHAT PROFIL</span>
                            <div class="flex items-center justify-center rounded-md group-hover:bg-black w-7 h-7 sm:w-8 sm:h-8 transition-colors duration-300">
                                <svg class="w-4 h-4 text-black group-hover:text-white transition-colors duration-300" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Jero Wacik -->
                <div class="bg-gray-100 max-w-sm rounded-2xl overflow-hidden shadow-sm transition-all duration-300 group flex flex-col cursor-pointer">
                    <div class="relative overflow-hidden">
                        <img src="{{ asset('images/profile/daftar-menteri/Jero Wacik.png') }}" alt="Jero Wacik" class="w-full h-full transition-transform duration-500">
                    </div>
                    <div class="p-6 pb-4 flex flex-col flex-1">
                        <h3 class="text-base sm:text-lg font-bold text-gray-900 leading-snug font-roboto group-hover:text-black">Jero Wacik</h3>
                        <span class="inline-block mt-1 bg-neutral-800 text-white text-xs font-bold px-4 py-1 rounded font-roboto w-fit">KE-22</span>
                        <p class="mt-2 text-sm text-gray-600 font-roboto max-sm:mb-4">23 Oktober 2019 - 19 Agustus 2024</p>
                        <div class="w-full h-px bg-gray-200 my-2 group-hover:bg-black transition-colors duration-300"></div>
                        <div class="flex items-center justify-between text-xs sm:text-sm text-gray-600 group-hover:text-black">
                            <span class="font-roboto font-medium">LIHAT PROFIL</span>
                            <div class="flex items-center justify-center rounded-md group-hover:bg-black w-7 h-7 sm:w-8 sm:h-8 transition-colors duration-300">
                                <svg class="w-4 h-4 text-black group-hover:text-white transition-colors duration-300" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Darwin Zahedy Saleh -->
                <div class="bg-gray-100 max-w-sm rounded-2xl overflow-hidden shadow-sm transition-all duration-300 group flex flex-col cursor-pointer">
                    <div class="relative overflow-hidden">
                        <img src="{{ asset('images/profile/daftar-menteri/Darwin Zahedy Saleh.png') }}" alt="Darwin Zahedy Saleh" class="w-full h-full transition-transform duration-500">
                    </div>
                    <div class="p-6 pb-4 flex flex-col flex-1">
                        <h3 class="text-base sm:text-lg font-bold text-gray-900 leading-snug font-roboto group-hover:text-black">Darwin Zahedy Saleh</h3>
                        <span class="inline-block mt-1 bg-neutral-800 text-white text-xs font-bold px-4 py-1 rounded font-roboto w-fit">KE-22</span>
                        <p class="mt-2 text-sm text-gray-600 font-roboto max-sm:mb-4">23 Oktober 2019 - 19 Agustus 2024</p>
                        <div class="w-full h-px bg-gray-200 my-2 group-hover:bg-black transition-colors duration-300"></div>
                        <div class="flex items-center justify-between text-xs sm:text-sm text-gray-600 group-hover:text-black">
                            <span class="font-roboto font-medium">LIHAT PROFIL</span>
                            <div class="flex items-center justify-center rounded-md group-hover:bg-black w-7 h-7 sm:w-8 sm:h-8 transition-colors duration-300">
                                <svg class="w-4 h-4 text-black group-hover:text-white transition-colors duration-300" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Purnomo Yusgiantoro -->
                <div class="bg-gray-100 max-w-sm rounded-2xl overflow-hidden shadow-sm transition-all duration-300 group flex flex-col cursor-pointer">
                    <div class="relative overflow-hidden">
                        <img src="{{ asset('images/profile/daftar-menteri/Purnomo Yusgiantoro.png') }}" alt="Purnomo Yusgiantoro" class="w-full h-full transition-transform duration-500">
                    </div>
                    <div class="p-6 pb-4 flex flex-col flex-1">
                        <h3 class="text-base sm:text-lg font-bold text-gray-900 leading-snug font-roboto group-hover:text-black">Purnomo Yusgiantoro</h3>
                        <span class="inline-block mt-1 bg-neutral-800 text-white text-xs font-bold px-4 py-1 rounded font-roboto w-fit">KE-22</span>
                        <p class="mt-2 text-sm text-gray-600 font-roboto max-sm:mb-4">23 Oktober 2019 - 19 Agustus 2024</p>
                        <div class="w-full h-px bg-gray-200 my-2 group-hover:bg-black transition-colors duration-300"></div>
                        <div class="flex items-center justify-between text-xs sm:text-sm text-gray-600 group-hover:text-black">
                            <span class="font-roboto font-medium">LIHAT PROFIL</span>
                            <div class="flex items-center justify-center rounded-md group-hover:bg-black w-7 h-7 sm:w-8 sm:h-8 transition-colors duration-300">
                                <svg class="w-4 h-4 text-black group-hover:text-white transition-colors duration-300" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-public.main>