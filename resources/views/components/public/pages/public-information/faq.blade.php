<x-public.main>
    <section class="">
        <div class="relative w-full bg-neutral-600 py-12 px-4 sm:px-6 md:px-8 lg:px-12 xl:px-16 2xl:px-20">
            <div class="absolute inset-0 h-full bg-no-repeat bg-contain opacity-70" style="background-image:url('{{ asset('images/asset/header line asset.png') }}');"></div>
            <div class="max-w-[90rem] relative z-10">
                <div class="flex flex-col gap-2">
                    <div class="mb-4 sm:mb-6 gap-2 sm:gap-4 items-center justify-start flex flex-row flex-wrap text-white font-roboto">
                        <strong class="text-xs sm:text-sm">Beranda</strong>
                        <span class="text-xs sm:text-sm">&#9679;</span>
                        <strong class="text-xs sm:text-sm">Informasi Publik</strong>
                        <span class="text-xs sm:text-sm">&#9679;</span>
                        <span class="text-xs sm:text-sm">FAQ</span>
                    </div>
                    <h1 class="text-3xl md:text-4xl font-roboto font-bold text-primary-700 leading-tight">Pertanyaan yang Sering Diajukan</h1>
                    <p class="text-white/90 text-sm md:text-base">Temukan jawaban cepat atas pertanyaan umum seputar layanan dan informasi publik kami.</p>
                </div>
            </div>
        </div>

        <div class="relative mx-auto py-12 px-4 sm:px-6 md:px-8 lg:px-12 xl:px-16 2xl:px-20">
            <div class="max-w-5xl mx-auto">
                @if(($faqs ?? collect())->isNotEmpty())
                    <div class="space-y-4">
                        @foreach($faqs as $faq)
                            <details class="group rounded-2xl border border-neutral-200 bg-white hover:border-neutral-300 transition">
                                <summary class="list-none cursor-pointer px-4 sm:px-5 py-4 sm:py-5 flex gap-4 items-center">
                                    <div class="flex-none w-10 h-10 rounded-full bg-primary-700 flex items-center justify-center">
                                        <span class="text-neutral-900 font-roboto font-bold text-lg">?</span>
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <h3 class="text-neutral-900 font-roboto font-semibold text-base sm:text-lg">
                                            {{ $faq->question }}
                                        </h3>
                                        <!-- Chevron -->
                                        <div class="ml-auto sm:hidden"></div>
                                    </div>
                                    <div class="flex-none">
                                        <div class="w-9 h-9 rounded-full border border-neutral-300 text-neutral-600 flex items-center justify-center transition group-open:border-primary-700 group-open:bg-primary-700 group-open:text-black">
                                            <svg class="w-5 h-5 transform transition group-open:rotate-180" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                                <path d="M6 9l6 6 6-6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </div>
                                    </div>
                                </summary>
                                <div class="px-4 sm:px-5 pb-5 -mt-2 text-neutral-700 font-roboto leading-relaxed">
                                    {!! nl2br(e($faq->answer)) !!}
                                </div>
                            </details>
                        @endforeach
                    </div>
                @else
                    <div class="rounded-2xl border border-dashed border-neutral-300 p-8 text-center text-neutral-600">
                        FAQ belum tersedia saat ini.
                    </div>
                @endif
            </div>
        </div>
    </section>
</x-public.main>