<x-public.main>

    <section class="py-8 md:py-10 lg:py-12">
        <div class="px-4 sm:px-6 md:px-8 lg:px-12 xl:px-16 2xl:px-20">
            <div class="mb-8 gap-4 items-center justify-start flex flex-row">
                <strong class="text-sm">Beranda</strong>
                <span>&#9679;</span>
                <strong class="text-sm">Profil</strong>
                <span>&#9679;</span>
                <span class="text-sm">Daftar Pejabat Eselon 1</span>
            </div>

            <div class="flex items-center justify-between mb-8">
                <div>
                    <h2 class="text-xl md:text-3xl lg:text-4xl font-bold text-gray-900 font-roboto">Profil Pimpinan</h2>
                    <h4 class="md:text-lg text-sm font-semibold text-gray-600 font-roboto">
                        Kementerian Energi dan Sumber Daya Mineral telah berdiri sejak 11 September 1945. Pada awal mulanya lembaga ini merupakan lembaga yang pertama kali menangani Pertambangan di Indonesia. Lembaga ini disebut sebagai Jawatan Tambang dan Geologi. Jawatan ini, semula bernama Chisitsu Chosajo, bernaung di Kementerian Kemakmuran. Menteri yang pertama kali menjabat adalah Ir. Surachman Tjokroadi.
                    </h4>
                </div>
            </div>

            <div class="max-w-[90rem] mx-auto">
                <!-- Kartu unggulan (terpusat) -->
                <h3 class="text-xl md:text-3xl lg:text-4xl font-bold text-gray-900 font-roboto text-center mb-8">Menteri & Wakil Menteri Perdagangan</h3>

                <div class="flex justify-center gap-4 sm:gap-6 xl:gap-12 mb-4 md:mb-6 xl:mb-12 2xl:mb-16 flex-wrap">
                    @foreach(($menteriOfficials ?? collect()) as $official)
                        <div class="flex justify-center w-full max-w-sm">
                            <div class="bg-gray-100 max-w-sm w-full rounded-2xl overflow-hidden shadow-sm transition-all duration-300 group flex flex-col cursor-pointer">
                                <div class="relative overflow-hidden">
                                    <img src="{{ $official->photo_url ?? asset('images/profile/daftar-menteri/default.png') }}" alt="{{ $official->name }}" class="w-full h-full object-contain transition-transform duration-500">
                                </div>
                                <div class="p-6 pb-4 flex flex-col flex-1">
                                    <h3 class="text-base sm:text-lg font-bold text-gray-900 leading-snug font-roboto group-hover:text-black">{{ $official->name }}</h3>
                                    <span class="inline-block mt-1 bg-neutral-800 text-white text-xs font-bold px-4 py-1 rounded font-roboto w-fit">{{ strtoupper($official->position) }}</span>
                                    <p class="mt-2 text-sm text-gray-600 font-roboto">
                                        {{ optional($official->start_period)->translatedFormat('d F Y') }} - {{ optional($official->end_period)->translatedFormat('d F Y') }}
                                    </p>
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
                    @endforeach

                    @foreach(($wakilMenteriOfficials ?? collect()) as $official)
                        <div class="flex justify-center w-full max-w-sm">
                            <div class="bg-gray-100 max-w-sm w-full rounded-2xl overflow-hidden shadow-sm transition-all duration-300 group flex flex-col cursor-pointer">
                                <div class="relative overflow-hidden">
                                    <img src="{{ $official->photo_url ?? asset('images/profile/daftar-menteri/default.png') }}" alt="{{ $official->name }}" class="w-full h-full object-contain transition-transform duration-500">
                                </div>
                                <div class="p-6 pb-4 flex flex-col flex-1">
                                    <h3 class="text-base sm:text-lg font-bold text-gray-900 leading-snug font-roboto group-hover:text-black">{{ $official->name }}</h3>
                                    <span class="inline-block mt-1 bg-neutral-800 text-white text-xs font-bold px-4 py-1 rounded font-roboto w-fit">{{ strtoupper($official->position) }}</span>
                                    <p class="mt-2 text-sm text-gray-600 font-roboto">
                                        {{ optional($official->start_period)->translatedFormat('d F Y') }} - {{ optional($official->end_period)->translatedFormat('d F Y') }}
                                    </p>
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
                    @endforeach
                </div>

                <!-- Grid kartu lainnya: mobile 2 kolom, md 3, lg 4 -->
                <h3 class="text-xl md:text-2xl lg:text-3xl font-bold text-gray-900 font-roboto text-center mt-10 mb-8">Eselon 1</h3>

                <div class="grid grid-cols-2 gap-4 sm:gap-6 xl:gap-12 md:grid-cols-3">
                    @forelse(($pejabatOfficials ?? collect()) as $official)
                        <div class="bg-gray-100 max-w-sm rounded-2xl overflow-hidden shadow-sm transition-all duration-300 group flex flex-col cursor-pointer">
                            <div class="relative overflow-hidden">
                                <img src="{{ $official->photo_url ?? asset('images/profile/daftar-menteri/default.png') }}" alt="{{ $official->name }}" class="w-full h-full transition-transform duration-500">
                            </div>
                            <div class="p-6 pb-4 flex flex-col flex-1">
                                <h3 class="text-base sm:text-lg font-bold text-gray-900 leading-snug font-roboto group-hover:text-black">{{ $official->name }}</h3>
                                <span class="inline-block mt-1 bg-neutral-800 text-white text-xs font-bold px-4 py-1 rounded font-roboto w-fit">{{ strtoupper($official->position) }}</span>
                                <p class="mt-2 text-sm text-gray-600 font-roboto max-sm:mb-4">
                                    {{ optional($official->start_period)->translatedFormat('d F Y') }} - {{ optional($official->end_period)->translatedFormat('d F Y') }}
                                </p>
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
                    @empty
                        <div class="col-span-2 md:col-span-3">
                            <div class="bg-gray-50 border border-gray-200 rounded-xl p-6 text-center text-gray-600">
                                Data pejabat belum tersedia.
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>

        </div>
    </section>

</x-public.main>