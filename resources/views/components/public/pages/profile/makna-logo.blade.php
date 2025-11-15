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
                        <span class="text-xs sm:text-sm">Arti Logo</span>
                    </div>
                    <h1 class="text-3xl md:text-4xl font-roboto font-bold text-primary-700 leading-tight">Arti Logo</h1>
                    <p class="text-white/90 text-sm md:text-base">19 Agustus 2024 - Sekarang</p>
                </div>
            </div>
        </div>
        
        <div class="max-w-[90rem] mx-auto py-12 px-4 sm:px-6 md:px-8 lg:px-12 xl:px-16 2xl:px-20">
            <div class="flex flex-col md:flex-row justify-start gap-6 md:gap-8">
                <div class="w-full md:w-40 lg:w-48 shrink-0 max-md:max-w-52 max-md:mx-auto">
                    <img class="w-full h-auto" src="{{ $logoMeaning->logo_url ?? asset('images/profile/logo-esdm.png') }}" alt="Logo KESDM">
                </div>
                <div class="flex-1 space-y-2 md:space-y-4">
                    <p class="text-neutral-900 text-base md:text-lg lg:text-xl leading-relaxed font-roboto font-semibold">
                        {{ $logoMeaning->description ?? '' }}
                    </p>
                </div>
            </div>

            <div class="py-8">
                <h2 class="text-2xl font-bold text-neutral-900 mb-4 sm:mb-6 font-roboto">Arti/Makna bentuk Logo KESDM</h2>
                <div class="text-neutral-700 text-sm md:text-base leading-relaxed font-roboto space-y-3 md:space-y-2">
                    <div class="[&>p]:mb-3 [&>ul]:list-disc [&>ul]:pl-6 [&>ol]:list-decimal [&>ol]:pl-6 [&>li]:mb-1">
                        {!! $logoMeaning->meanings !!}
                </div>
            </div>
        </div>
    </section>
</x-public.main>