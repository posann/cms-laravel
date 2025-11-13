@props(['news'])

<section class="py-8 md:py-12 lg:py-16 bg-gray-100">
    <div class="px-4 sm:px-6 md:px-8 lg:px-12 xl:px-16 2xl:px-20">
        <div class="flex items-center justify-between mb-8">
            <h2 class="text-xl md:text-2xl lg:text-3xl font-bold text-gray-900 font-roboto">Berita lainnya</h2>
            <a href="/berita"
                class="group flex items-center gap-3 text-gray-800  transition-colors duration-300 font-roboto">
                <span class="text-base md:text-lg font-medium">Lihat Semua Berita</span>
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

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach ($news as $item)
                <x-public.components.card.card-news :item="$item" />
            @endforeach
        </div>
    </div>
</section>
