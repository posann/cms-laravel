<x-public.main :pageTitle="$doc->title ?? 'Standar Pelayanan'" :pageDescription="$doc->description ? \Illuminate\Support\Str::limit(strip_tags($doc->description),160) : 'Informasi terkini mengenai kebijakan, prosedur, dan pelaksanaan standar pelayanan perizinan di lingkungan Kementerian Energi dan Sumber Daya Mineral.'">

    <!-- Header / Hero -->
    <section class="">
        <div class="relative w-full bg-neutral-600 py-12 px-4 sm:px-6 md:px-8 lg:px-12 xl:px-16 2xl:px-20">
            <div class="absolute inset-0 h-full bg-no-repeat bg-contain opacity-70" style="background-image:url('{{ asset('images/asset/header line asset.png') }}');"></div>
            <div class="max-w-[90rem] relative z-10">
                <div class="flex flex-col gap-2">
                    <!-- Breadcrumb -->
                    <div class="mb-4 sm:mb-6 gap-2 sm:gap-4 items-center justify-start flex flex-row flex-wrap text-white font-roboto">
                        <strong class="text-xs sm:text-sm">Beranda</strong>
                        <span class="text-xs sm:text-sm">&#9679;</span>
                        <strong class="text-xs sm:text-sm">Perizinan</strong>
                        <span class="text-xs sm:text-sm">&#9679;</span>
                        <span class="text-xs sm:text-sm">Standar Pelayanan</span>
                    </div>
                    <!-- Page Title -->
                    <h1 class="text-3xl md:text-4xl font-roboto font-bold text-primary-700 leading-tight">
                        Standar Pelayanan
                    </h1>
                    <p class="text-white/90 text-sm md:text-base max-w-4xl">
                        Informasi terkini mengenai kebijakan, prosedur, dan pelaksanaan standar pelayanan perizinan di lingkungan Kementerian Energi dan Sumber Daya Mineral.
                    </p>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="relative mx-auto py-12 px-4 sm:px-6 md:px-8 lg:px-12 xl:px-16 2xl:px-20 max-w-5xl space-y-10">

            <!-- Document Title Block -->
            <div class="bg-neutral-100 border border-neutral-300 rounded-md px-6 py-6 shadow-sm">
                <h2 class="font-roboto font-bold text-xl sm:text-2xl md:text-3xl leading-snug tracking-wide text-neutral-900 uppercase">
                    {{ $title ?: 'PENETAPAN STANDAR PELAYANAN PERIZINAN ONLINE PADA DIREKTORAT JENDERAL MINERAL DAN BATUBARA' }}
                </h2>
            </div>

            <!-- Description -->
            @if($description)
                <div class="max-w-5xl">
                    <p class="font-roboto text-base md:text-lg leading-relaxed text-neutral-700">
                        {!! nl2br(e($description)) !!}
                    </p>
                </div>
            @endif

            <!-- PDF Preview / Fallback -->
            <div class="w-full flex flex-col items-center">
                @if($hasPdf && $streamRouteExists)
                    <div class="w-full max-w-4xl border border-neutral-800 bg-black/90 rounded-md shadow-xl overflow-hidden">
                        <iframe
                            src="{{ route('service-standard.stream') }}"
                            title="Standar Pelayanan PDF"
                            class="w-full h-[900px] bg-white"
                            loading="lazy"
                        ></iframe>
                    </div>
                @else
                    <div class="w-full max-w-3xl rounded-2xl border border-dashed border-neutral-300 p-10 text-center text-neutral-600">
                        @if(!$hasPdf)
                            PDF belum tersedia.
                        @else
                            Route stream PDF belum didefinisikan. Pastikan menambahkan route:
                            <code class="block mt-2 text-xs bg-neutral-100 p-2 rounded">
                                Route::get('/service-standard/pdf', [ServiceStandardController::class, 'streamPdf'])->name('service-standard.stream');
                            </code>
                        @endif
                    </div>
                @endif
            </div>

            <!-- Actions -->
            <div class="w-full max-w-4xl flex flex-col sm:flex-row sm:items-center sm:justify-between gap-6">
                @if($hasPdf && $downloadRouteExists)
                    <a href="{{ route('service-standard.download') }}"
                       class="inline-flex items-center gap-2 px-6 py-3 rounded-full bg-yellow-300 hover:bg-yellow-400 text-neutral-900 font-semibold font-roboto text-sm shadow-sm transition-all duration-300 w-max">
                        <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none">
                            <path d="M12 3v12m0 0l4-4m-4 4l-4-4M4 21h16" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        Unduh PDF
                    </a>
                @endif

                <!-- Share -->
                <div class="flex items-center gap-2">
                    <span class="text-xs font-roboto text-neutral-600 uppercase tracking-wide">Share</span>
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}"
                       target="_blank" rel="noopener"
                       class="p-1.5 rounded-full hover:bg-neutral-100 transition-colors">
                        <svg class="w-4 h-4 text-neutral-700" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M13 22v-9h3l1-4h-4V7a1 1 0 0 1 1-1h3V2h-3a5 5 0 0 0-5 5v3H6v4h3v9h4z"/>
                        </svg>
                    </a>
                    <a href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}&text={{ urlencode($title) }}"
                       target="_blank" rel="noopener"
                       class="p-1.5 rounded-full hover:bg-neutral-100 transition-colors">
                        <svg class="w-4 h-4 text-neutral-700" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M22 5.8c-.7.3-1.4.5-2.1.6a3.7 3.7 0 0 0 1.6-2 7.3 7.3 0 0 1-2.3.9A3.6 3.6 0 0 0 12 7.4a3.5 3.5 0 0 0 .1.8A10.3 10.3 0 0 1 3 5.2a3.6 3.6 0 0 0 1.1 4.8 3.5 3.5 0 0 1-1.6-.5v.1a3.6 3.6 0 0 0 2.9 3.6 3.7 3.7 0 0 1-1.6.1 3.6 3.6 0 0 0 3.4 2.5A7.2 7.2 0 0 1 2 18a10.2 10.2 0 0 0 5.6 1.6c6.7 0 10.4-5.6 10.4-10.4v-.5A7.5 7.5 0 0 0 22 5.8z"/>
                        </svg>
                    </a>
                    <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(url()->current()) }}&title={{ urlencode($title) }}"
                       target="_blank" rel="noopener"
                       class="p-1.5 rounded-full hover:bg-neutral-100 transition-colors">
                        <svg class="w-4 h-4 text-neutral-700" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M4.98 3.5a2.5 2.5 0 1 0 0 5.001 2.5 2.5 0 0 0 0-5zM3 9h4v12H3zM9 9h3.8v1.7h.1a4.2 4.2 0 0 1 3.8-2c4 0 4.7 2.6 4.7 6v6h-4v-5.3c0-1.3 0-3-1.8-3-1.8 0-2.1 1.4-2.1 2.9V21h-4V9z"/>
                        </svg>
                    </a>
                </div>
            </div>

        </div>
    </section>

</x-public.main>