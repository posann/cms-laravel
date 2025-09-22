<x-public.main>
    @props(['news'])

    <section class="py-8 md:py-10 lg:py-12 bg-gray-100">
        <div class="px-4 sm:px-6 md:px-8 lg:px-12 xl:px-16 2xl:px-20">
            <div class="mb-8 gap-4 items-center justify-start flex flex-row">
                <strong class="text-sm">Beranda</strong>
                <span>&#9679;</span>
                <strong class="text-sm">Media Center</strong>
                <span>&#9679;</span>
                <span class="text-sm">Berita</span>
            </div>

            <div class="flex items-center justify-between mb-8">
                <div>
                    <h2 class="text-xl md:text-3xl lg:text-4xl font-bold text-gray-900 font-roboto">Berita</h2>
                    <h4 class="md:text-xl text-sm font-semibold text-gray-600 font-roboto">Kumpulan Informasi Terkini Seputa Kegiatan
                        dan Kebijakan Kementrian Energi & Sumber Daya Mineral</h4
                        class="text-sm md:text-base font-medium text-gray-600 font-roboto">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 items lg:grid-cols-4 gap-6">
                @foreach ($news as $item) 
                        <x-public.components.card.card-news :item="$item"/>
                @endforeach
            </div>
        </div>
    </section>

</x-public.main>