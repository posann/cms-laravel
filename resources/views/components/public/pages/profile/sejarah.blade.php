<x-public.main>
    <section>
    <!-- Header Section dengan background abu-abu + pola garis -->
        <div class="relative w-full bg-neutral-600 py-12 px-4 sm:px-6 md:px-8 lg:px-12 xl:px-16 2xl:px-20">
            <div class="absolute inset-0 h-full bg-no-repeat bg-contain opacity-70" style="background-image:url('{{ asset('images/asset/header line asset.png') }}');"></div>
            <div class="max-w-[90rem] relative z-10">
                <div class="flex flex-col gap-2">
                    <div class="mb-4 sm:mb-6 gap-2 sm:gap-4 items-center justify-start flex flex-row flex-wrap text-white font-roboto">
                        <strong class="text-xs sm:text-sm">Beranda</strong>
                        <span class="text-xs sm:text-sm">&#9679;</span>
                        <strong class="text-xs sm:text-sm">Profil</strong>
                        <span class="text-xs sm:text-sm">&#9679;</span>
                        <span class="text-xs sm:text-sm">Sejarah</span>
                    </div>
                    <h1 class="text-3xl md:text-4xl font-roboto font-bold text-primary-700 leading-tight">Sejarah</h1>
                    <p class="text-white/90 text-sm md:text-base">Kumpulan informasi terkini seputar kegiatan dan kebijakan Kementerian Energi dan Sumber Daya Mineral.</p>
                </div>
            </div>
        </div>

        <!-- Timeline Section -->
        <div>
            <div class="relative container mx-auto max-w-[90rem] py-12 px-4 sm:px-6 md:px-8">
                <!-- Garis vertikal timeline -->
                <div class="absolute left-[81px] sm:left-[99px] md:left-[150px] lg:left-[159px] top-0 bottom-0 w-0.5 bg-primary-700"></div>

                <!-- Items -->
                <div class="space-y-8 sm:space-y-10 md:space-y-12">
                    <!-- Item 1945 -->
                    <div class="relative flex items-center gap-x-1 md:gap-x-6 lg:gap-x-8">
                        <div class="min-w-[55px] max-sm:max-w-[55px] sm:min-w-[65px] md:min-w-[84px]">
                            <div class="text-xl sm:text-2xl md:text-3xl font-bold text-gray-800 tracking-tight whitespace-nowrap">1945</div>
                        </div>
                        <div class="min-w-3.5 min-h-3.5 md:min-w-6 md:min-h-6 rounded-full bg-primary-700"></div>
                        <div class="max-w-6xl text-gray-800 text-sm md:text-base leading-relaxed">
                            Lembaga pertama yang menangani Pertambangan di Indonesia adalah Jawatan Tambang dan Geologi yang dibentuk pada tanggal 11 September 1945. Jawatan ini semula bernama Chisutsu Chosajo, bernaung di bawah Kementerian Kemakmuran.
                        </div>
                    </div>

                    <!-- Item 1952 -->
                    <div class="relative flex items-center gap-x-1 md:gap-x-6 lg:gap-x-8">
                        <div class="min-w-[55px] max-sm:max-w-[55px] sm:min-w-[65px] md:min-w-[84px]">
                            <div class="text-xl sm:text-2xl md:text-3xl font-bold text-gray-800 tracking-tight whitespace-nowrap">1952</div>
                        </div>
                        <div class="min-w-3.5 min-h-3.5 md:min-w-6 md:min-h-6 rounded-full bg-primary-700"></div>
                        <div class="max-w-6xl text-gray-800 text-sm md:text-base leading-relaxed">
                            Jawatan Tambang dan Geologi yang pada saat itu berada di Kementerian Perindustrian, berdasarkan SK Menteri Perekonomian No. 2360a/M Tahun 1952, diubah menjadi Direktorat Pertambangan yang terdiri atas Pusat Jawatan Pertambangan dan Pusat Jawatan Geologi.
                        </div>
                    </div>

                    <!-- Item 1957 -->
                    <div class="relative flex items-center gap-x-1 md:gap-x-6 lg:gap-x-8">
                        <div class="min-w-[55px] max-sm:max-w-[55px] sm:min-w-[65px] md:min-w-[84px]">
                            <div class="text-xl sm:text-2xl md:text-3xl font-bold text-gray-800 tracking-tight whitespace-nowrap">1957</div>
                        </div>
                        <div class="min-w-3.5 min-h-3.5 md:min-w-6 md:min-h-6 rounded-full bg-primary-700"></div>
                        <div class="max-w-6xl text-gray-800 text-sm md:text-base leading-relaxed">
                            Berdasarkan Keppres No.131 Tahun 1957, Kementerian Perekonomian dipecah menjadi Kementerian Perdagangan dan Kementerian Perindustrian. Berdasarkan SK Menteri Perindustrian No. 4247 a/M tahun 1957, Pusat-pusat dibawah Direktorat Pertambangan berubah menjadi Jawatan Pertambangan dan Jawatan Geologi.
                        </div>
                    </div>

                    <!-- Item 1959 -->
                    <div class="relative flex items-center gap-x-1 md:gap-x-6 lg:gap-x-8">
                        <div class="min-w-[55px] max-sm:max-w-[55px] sm:min-w-[65px] md:min-w-[84px]">
                            <div class="text-xl sm:text-2xl md:text-3xl font-bold text-gray-800 tracking-tight whitespace-nowrap">1959</div>
                        </div>
                        <div class="min-w-3.5 min-h-3.5 md:min-w-6 md:min-h-6 rounded-full bg-primary-700"></div>
                        <div class="max-w-6xl text-gray-800 text-sm md:text-base leading-relaxed">
                            Kementerian Perindustrian dipecah menjadi Departemen Perindustrian Dasar/Pertambangan dan Departemen Perindustrian Rakyat dimana bidang pertambangan minyak dan gas bumi berada dibawah Departemen Perindustrian Dasar dan Pertambangan.
                        </div>
                    </div>

                    <!-- Item 1961 -->
                    <div class="relative flex items-center gap-x-1 md:gap-x-6 lg:gap-x-8">
                        <div class="min-w-[55px] max-sm:max-w-[55px] sm:min-w-[65px] md:min-w-[84px]">
                            <div class="text-xl sm:text-2xl md:text-3xl font-bold text-gray-800 tracking-tight whitespace-nowrap">1961</div>
                        </div>
                        <div class="min-w-3.5 min-h-3.5 md:min-w-6 md:min-h-6 rounded-full bg-primary-700"></div>
                        <div class="max-w-6xl text-gray-800 text-sm md:text-base leading-relaxed">
                            Pemerintah membentuk Biro Minyak dan Gas Bumi yang berada dibawah Departemen Perindustrian Dasar dan Pertambangan.
                        </div>
                    </div>

                    <!-- Item 1962 -->
                    <div class="relative flex items-center gap-x-1 md:gap-x-6 lg:gap-x-8">
                        <div class="min-w-[55px] max-sm:max-w-[55px] sm:min-w-[65px] md:min-w-[84px]">
                            <div class="text-xl sm:text-2xl md:text-3xl font-bold text-gray-800 tracking-tight whitespace-nowrap">1962</div>
                        </div>
                        <div class="min-w-3.5 min-h-3.5 md:min-w-6 md:min-h-6 rounded-full bg-primary-700"></div>
                        <div class="max-w-6xl text-gray-800 text-sm md:text-base leading-relaxed">
                            Jawatan Geologi dan Jawatan Pertambangan diubah menjadi Direktorat Geologi dan Direktorat Pertambangan.
                        </div>
                    </div>

                    <!-- Item 1963 -->
                    <div class="relative flex items-center gap-x-1 md:gap-x-6 lg:gap-x-8">
                        <div class="min-w-[55px] max-sm:max-w-[55px] sm:min-w-[65px] md:min-w-[84px]">
                            <div class="text-xl sm:text-2xl md:text-3xl font-bold text-gray-800 tracking-tight whitespace-nowrap">1963</div>
                        </div>
                        <div class="min-w-3.5 min-h-3.5 md:min-w-6 md:min-h-6 rounded-full bg-primary-700"></div>
                        <div class="max-w-6xl text-gray-800 text-sm md:text-base leading-relaxed">
                            Biro Minyak dan Gas Bumi diubah menjadi Direktorat Minyak dan Gas Bumi yang berada dibawah kewenangan Pembantu Menteri Urusan Pertambangan dan Perusahaan-perusahaan Tambang Negara.
                        </div>
                    </div>

                    <!-- Item 1965 -->
                    <div class="relative flex items-center gap-x-1 md:gap-x-6 lg:gap-x-8">
                        <div class="min-w-[55px] max-sm:max-w-[55px] sm:min-w-[65px] md:min-w-[84px]">
                            <div class="text-xl sm:text-2xl md:text-3xl font-bold text-gray-800 tracking-tight whitespace-nowrap">1965</div>
                        </div>
                        <div class="min-w-3.5 min-h-3.5 md:min-w-6 md:min-h-6 rounded-full bg-primary-700"></div>
                        <div class="max-w-6xl text-gray-800 text-sm md:text-base leading-relaxed">
                            Departemen Perindustrian Dasar/Pertambangan dipecah menjadi tiga departemen yaitu: Departemen Perindustrian Dasar, Departemen Pertambangan dan Departemen Urusan Minyak dan Gas Bumi.
                        </div>
                    </div>

                    <!-- Item tanggal khusus -->
                    <div class="relative flex items-center gap-x-1 md:gap-x-6 lg:gap-x-8">
                        <div class="min-w-[55px] max-sm:max-w-[55px] sm:min-w-[65px] md:min-w-[84px]">
                            <div class="text-base sm:text-xl md:text-2xl font-bold text-gray-800 leading-snug text-left">11 Juni<br class="hidden sm:block"> 1965</div>
                        </div>
                        <div class="min-w-3.5 min-h-3.5 md:min-w-6 md:min-h-6 rounded-full bg-primary-700"></div>
                        <div class="max-w-6xl text-gray-800 text-sm md:text-base leading-relaxed">
                            Menteri Urusan Minyak dan Gas Bumi menetapkan berdirinya Lembaga Minyak dan Gas Bumi (Lemigas).
                        </div>
                    </div>

                    <!-- Item 1966 -->
                    <div class="relative flex items-center gap-x-1 md:gap-x-6 lg:gap-x-8">
                        <div class="min-w-[55px] max-sm:max-w-[55px] sm:min-w-[65px] md:min-w-[84px]">
                            <div class="text-xl sm:text-2xl md:text-3xl font-bold text-gray-800 tracking-tight whitespace-nowrap">1966</div>
                        </div>
                        <div class="min-w-3.5 min-h-3.5 md:min-w-6 md:min-h-6 rounded-full bg-primary-700"></div>
                        <div class="max-w-6xl text-gray-800 text-sm md:text-base leading-relaxed">
                            Dalam Kabinet Ampera, Departemen Minyak dan Gas Bumi dan Departemen Pertambangan dilebur menjadi Departemen Pertambangan.
                        </div>
                    </div>

                    <!-- Item 1978 -->
                    <div class="relative flex items-center gap-x-1 md:gap-x-6 lg:gap-x-8">
                        <div class="min-w-[55px] max-sm:max-w-[55px] sm:min-w-[65px] md:min-w-[84px]">
                            <div class="text-xl sm:text-2xl md:text-3xl font-bold text-gray-800 tracking-tight whitespace-nowrap">1978</div>
                        </div>
                        <div class="min-w-3.5 min-h-3.5 md:min-w-6 md:min-h-6 rounded-full bg-primary-700"></div>
                        <div class="max-w-6xl text-gray-800 text-sm md:text-base leading-relaxed">
                            Departemen Pertambangan berubah menjadi Departemen Pertambangan dan Energi.
                        </div>
                    </div>

                    <!-- Item 2000 -->
                    <div class="relative flex items-center gap-x-1 md:gap-x-6 lg:gap-x-8">
                        <div class="min-w-[55px] max-sm:max-w-[55px] sm:min-w-[65px] md:min-w-[84px]">
                            <div class="text-xl sm:text-2xl md:text-3xl font-bold text-gray-800 tracking-tight whitespace-nowrap">2000</div>
                        </div>
                        <div class="min-w-3.5 min-h-3.5 md:min-w-6 md:min-h-6 rounded-full bg-primary-700"></div>
                        <div class="max-w-6xl text-gray-800 text-sm md:text-base leading-relaxed">
                            Departemen Pertambangan dan Energi berubah menjadi Departemen Energi dan Sumber Daya Mineral.
                        </div>
                    </div>

                    <!-- Item 2009 -->
                    <div class="relative flex items-center gap-x-1 md:gap-x-6 lg:gap-x-8">
                        <div class="min-w-[55px] max-sm:max-w-[55px] sm:min-w-[65px] md:min-w-[84px]">
                            <div class="text-xl sm:text-2xl md:text-3xl font-bold text-gray-800 tracking-tight whitespace-nowrap">2009</div>
                        </div>
                        <div class="min-w-3.5 min-h-3.5 md:min-w-6 md:min-h-6 rounded-full bg-primary-700"></div>
                        <div class="max-w-6xl text-gray-800 text-sm md:text-base leading-relaxed">
                            Sesuai Perpres 47/2009, nama "Departemen" diubah menjadi "Kementerian" yang memiliki tugas dan fungsi menyelenggarakan urusan pemerintahan di bidang energi dan sumber daya mineral untuk membantu Presiden dalam menyelenggarakan pemerintahan negara.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-public.main>