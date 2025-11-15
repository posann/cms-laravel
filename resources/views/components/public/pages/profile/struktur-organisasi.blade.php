<x-public.main>
    <section>
        <div class="relative w-full bg-neutral-600 py-12 px-4 sm:px-6 md:px-8 lg:px-12 xl:px-16 2xl:px-20">
            <div class="absolute inset-0 h-full bg-no-repeat bg-contain opacity-70" style="background-image:url('{{ asset('images/asset/header line asset.png') }}');"></div>
            <div class="max-w-[90rem] relative z-10">
                <div class="flex flex-col gap-2">
                    <div class="mb-4 sm:mb-6 gap-2 sm:gap-4 items-center justify-start flex flex-row flex-wrap text-white font-roboto">
                        <strong class="text-xs sm:text-sm">Beranda</strong>
                        <span class="text-xs sm:text-sm">&#9679;</span>
                        <strong class="text-xs sm:text-sm">Profil</strong>
                        <span class="text-xs sm:text-sm">&#9679;</span>
                        <span class="text-xs sm:text-sm">Struktur Organisasi</span>
                    </div>
                    <h1 class="text-3xl md:text-4xl font-roboto font-bold text-primary-700 leading-tight">Struktur Organisasi</h1>
                    <p class="text-white/90 text-sm md:text-base">Struktur kelembagaan yang menunjang pelaksanaan kebijakan energi dan sumber daya mineral.</p>
                </div>
            </div>
        </div>
        <div class="w-full py-6 lg:py-12 px-4 sm:px-6 md:px-8 lg:px-12 xl:px-16 2xl:px-20 bg-gray-100">
            <img class="w-full h-auto" src="{{ $organizationStructure->image_url}}" alt="struktur organisasi">
        </div>
    </section>
</x-public.main>