@props(['news', 'pers'])

<section 
    x-data="{ 
        activeTab: 'berita', // Status default
        linkTitle: 'Berita', 
        linkRoute: '/berita' 
    }" 
    class="py-8 md:py-12 lg:py-16 bg-gray-100"
>
    <div class="px-4 sm:px-6 md:px-8 lg:px-12 xl:px-16 2xl:px-20">
        <div class="flex items-center justify-between mb-8">
            <div class="flex flex-wrap items-center gap-4">
                <button 
                    type="button"
                    @click="
                        activeTab = 'berita'; 
                        linkTitle = 'Berita'; 
                        linkRoute = '/berita'
                    "
                    :class="{ 
                        'bg-yellow-400 hover:bg-yellow-500 text-gray-900': activeTab === 'berita', 
                        'bg-white hover:bg-gray-50 text-gray-500': activeTab !== 'berita' 
                    }"
                    class="flex items-center justify-center h-14 px-8 py-3 rounded-lg font-roboto text-sm md:text-base font-bold transition-colors duration-300 whitespace-nowrap"
                >
                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M6 3.5v17l13-8.5L6 3.5z"/>
                    </svg>
                    BERITA TERBARU
                </button>

                <button 
                    type="button"
                    @click="
                        activeTab = 'pers'; 
                        linkTitle = 'Siaran Pers'; 
                        linkRoute = '/siaran-pers'
                    "
                    :class="{ 
                        'bg-yellow-400 hover:bg-yellow-500 text-gray-900': activeTab === 'pers', 
                        'bg-white hover:bg-gray-50 text-gray-500': activeTab !== 'pers' 
                    }"
                    class="flex items-center justify-center h-14 px-8 py-3 rounded-lg font-roboto text-sm md:text-base font-bold transition-colors duration-300 whitespace-nowrap"
                >
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L12 15m0 0l2.25 2M12 15v3m0 0V3m0 0h5a2 2 0 012 2v14a2 2 0 01-2 2h-5m-7-14h5m-5 0V3m0 0H7a2 2 0 00-2 2v14a2 2 0 002 2h5"></path>
                    </svg>
                    SIARAN PERS
                </button>
            </div>
            
            <a :href="linkRoute"
                class="group flex items-center gap-3 text-gray-800 transition-colors duration-300 font-roboto">
                <span class="text-base md:text-lg font-medium">Lihat Semua <span x-text="linkTitle"></span></span>
                <div
                    class="w-10 h-10 rounded-full border-2 border-gray-800 flex items-center justify-center group-hover:border-primary-700 group-hover:bg-primary-700 group-hover:translate-x-2 transition-all duration-300 group">
                    <svg class="w-5 h-5 group-hover:text-black transition-colors duration-300" fill="currentColor"
                        viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </div>
            </a>
        </div>

        <template x-if="activeTab === 'berita'">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach ($news as $item)
                    <x-public.components.card.card-news :item="$item" />
                @endforeach
            </div>
        </template>

        <template x-if="activeTab === 'pers'">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach ($pers as $item)
                    <x-public.components.card.card-pers :item="$item" />
                @endforeach
            </div>
        </template>
    </div>
</section>