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
                        <span class="text-xs sm:text-sm">Visi-Misi</span>
                    </div>
                    <h1 class="text-3xl md:text-4xl font-roboto font-bold text-primary-700 leading-tight">Visi dan Misi</h1>
                    <p class="text-white/90 text-sm md:text-base">Inilah landasan visi dan misi Kementerian ESDM dalam mewujudkan pengelolaan energi dan sumber daya mineral yang adil, merata, dan berdaya saing.</p>
                </div>
            </div>
        </div>
        
        <div class="mx-auto py-12 px-4 sm:px-6 md:px-8 lg:px-12 xl:px-16 2xl:px-20">
            <div class="grid grid-cols-1 lg:grid-cols-1 xl:grid-cols-2 gap-x-16 gap-y-12">
                <!-- Visi -->
                <div class="bg-neutral-100 rounded-lg p-8">
                    <h2 class="text-2xl font-bold text-gray-800 mb-6">Visi</h2>
                    <p class="text-gray-700 text-base md:text-lg leading-relaxed">
                        {{ $visionMission->vision ?? 'Belum ada isi' }}
                    </p>
                </div>

                <!-- Misi -->
                <div class="bg-neutral-100 rounded-lg p-8">
                    <h2 class="text-2xl font-bold text-gray-800 mb-6">Misi</h2>
                    <ul class="list-decimal pl-6 space-y-4 text-gray-700 text-base md:text-lg leading-relaxed">
                        @if($visionMission && $visionMission->mission)
                            @php
                                $missionItems = explode("\n", $visionMission->mission);
                            @endphp
                            @foreach($missionItems as $item)
                                <li>{{ trim($item) }}</li>
                            @endforeach
                        @else
                            <p>Belum ada isi</p>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </section>
</x-public.main>