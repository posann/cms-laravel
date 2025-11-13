<x-public.main>
    @props(['news', 'categories'])

    {{-- News Section --}}
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
                    <h4 class="md:text-xl text-sm font-semibold text-gray-600 font-roboto">
                        Kumpulan Informasi Terkini Seputa Kegiatan
                        dan Kebijakan Kementrian Energi & Sumber Daya Mineral
                    </h4>
                </div>
            </div>

            <div class="my-6 flex justify-start w-full max-w-full">
                <form method="GET" action="{{ route('news') }}" class="max-w-4xl w-full flex items-center gap-4">
                    <select name="category"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
        focus:ring-primary-700 focus:border-primary-700 block w-full p-2.5">
                        <option value="">Semua Kategori</option>
                        @foreach ($categories as $c)
                            <option value="{{ $c->slug }}" {{ request('category') == $c->slug ? 'selected' : '' }}>
                                {{ $c->name }}
                            </option>
                        @endforeach
                    </select>

                    <!-- START DATE -->
                    <input type="date" name="start"
                        value="{{ request()->filled('start') ? request('start') : '' }}"
                        class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg 
        focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">

                    <span class="mx-2 text-gray-600 text-sm">Sampai</span>

                    <!-- END DATE -->
                    <input type="date" name="end" value="{{ request()->filled('end') ? request('end') : '' }}"
                        class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg 
        focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">

                    <!-- Search -->
                    <button type="submit"
                        class="focus:outline-none text-black bg-yellow-400 font-semibold hover:bg-yellow-500 
        focus:ring-4 focus:ring-yellow-200 rounded-lg text-sm px-5 py-2.5">
                        Search
                    </button>

                    <!-- Reset -->
                    <a href="{{ route('news') }}"
                        class="focus:outline-none text-white bg-red-600 font-semibold hover:bg-red-500 
        focus:ring-4 focus:ring-red-300 rounded-lg text-sm px-5 py-2.5">
                        Reset
                    </a>
                </form>


            </div>



            <div class="grid grid-cols-1 md:grid-cols-2 items lg:grid-cols-4 gap-6">
                @foreach ($news as $item)
                    <x-public.components.card.card-news :item="$item" />
                @endforeach
            </div>

            {{-- Pagination --}}
            @if ($news->hasPages())
                <div class="mt-10 flex justify-center">
                    <nav class="inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">

                        {{-- Previous Page Link --}}
                        @if ($news->onFirstPage())
                            <span
                                class="px-3 py-2 text-sm text-gray-400 bg-gray-100 rounded-l-md border border-gray-300 cursor-not-allowed">
                                ‹
                            </span>
                        @else
                            <a href="{{ $news->previousPageUrl() }}"
                                class="px-3 py-2 text-sm text-gray-600 bg-white border border-gray-300 hover:bg-yellow-400 hover:text-black rounded-l-md">
                                ‹
                            </a>
                        @endif

                        {{-- Page Numbers --}}
                        @foreach ($news->links()->elements[0] ?? [] as $page => $url)
                            @if ($page == $news->currentPage())
                                <span
                                    class="px-3 py-2 text-sm font-semibold bg-yellow-400 text-black border border-gray-300">{{ $page }}</span>
                            @else
                                <a href="{{ $url }}"
                                    class="px-3 py-2 text-sm text-gray-600 bg-white border border-gray-300 hover:bg-yellow-400 hover:text-black">
                                    {{ $page }}
                                </a>
                            @endif
                        @endforeach

                        {{-- Next Page Link --}}
                        @if ($news->hasMorePages())
                            <a href="{{ $news->nextPageUrl() }}"
                                class="px-3 py-2 text-sm text-gray-600 bg-white border border-gray-300 hover:bg-yellow-400 hover:text-black rounded-r-md">
                                ›
                            </a>
                        @else
                            <span
                                class="px-3 py-2 text-sm text-gray-400 bg-gray-100 rounded-r-md border border-gray-300 cursor-not-allowed">
                                ›
                            </span>
                        @endif
                    </nav>
                </div>
            @endif

        </div>
    </section>

</x-public.main>
