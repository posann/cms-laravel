<x-public.main>
    @props(['photos'])

    <section class="py-8 md:py-10 lg:py-12 bg-gray-100">
        <div class="px-4 sm:px-6 md:px-8 lg:px-12 xl:px-16 2xl:px-20">
            <div class="mb-8 gap-4 items-center justify-start flex flex-row">
                <strong class="text-sm">Beranda</strong>
                <span>&#9679;</span>
                <strong class="text-sm">Informasi Publik</strong>
                <span>&#9679;</span>
                <span class="text-sm">Foto</span>
            </div>

            <div class="flex items-center justify-between mb-8">
                <div>
                    <h2 class="text-xl md:text-3xl lg:text-4xl font-bold text-gray-900 font-roboto">Foto</h2>
                    <h4 class="md:text-xl text-sm font-semibold text-gray-600 font-roboto">
                        Kumpulan dokumentasi foto kegiatan dan informasi publik.
                    </h4>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                @forelse ($photos as $item)
                    <article class="bg-white max-w-sm h-[30rem] rounded-2xl overflow-hidden shadow-sm transition-all duration-300 group hover:bg-primary-700 hover:shadow-lg p-2 flex flex-col">
                        <div class="relative h-[16rem] overflow-hidden rounded-lg">
                            @php
                                $img = $item->image_url ?? asset('images/example/Slider Item 1.png');
                            @endphp
                            <img src="{{ $img }}" alt="{{ $item->title }}"
                                 class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                            <div class="absolute bottom-0 left-0">
                                <span class="bg-neutral-900 text-primary-700 text-xs font-bold px-3 py-1.5 rounded-tr-lg font-roboto group-hover:bg-black group-hover:text-primary-700 transition-colors duration-300">
                                    FOTO
                                </span>
                            </div>
                        </div>

                        <div class="p-3 pb-1 flex flex-col flex-1">
                            <div class="flex-1 flex flex-col justify-between">
                                <h3 class="text-lg font-bold text-gray-900 mb-2 leading-tight font-roboto group-hover:text-black transition-colors duration-300 line-clamp-3">
                                    {{ $item->title }}
                                </h3>
                                @if(!empty($item->description))
                                    <p class="text-sm mb-4 pb-4 self-start line-clamp-3">{{ strip_tags($item->description) }}</p>
                                @else
                                    <p class="text-sm mb-4 pb-4 self-start">&nbsp;</p>
                                @endif
                            </div>

                            <div>
                                <div class="w-full h-px bg-gray-200 mb-2 group-hover:bg-black transition-colors duration-300"></div>
                                <div class="flex items-center justify-between text-sm text-gray-600 group-hover:text-black transition-colors duration-300">
                                    <div class="flex items-center gap-1 font-roboto font-medium">
                                        <span>{{ optional($item->published_at)->format('F j, Y') }}</span>
                                    </div>
                                    <div class="flex items-center gap-4">
                                        <a href="{{ route('public-information.photos.show', $item->slug) }}">
                                            <div class="flex items-center justify-center rounded-md group-hover:bg-black w-8 h-8 transition-colors duration-300">
                                                <svg class="w-4 h-4 text-black group-hover:text-white transition-colors duration-300" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                                </svg>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                @empty
                    <div class="col-span-full">
                        <div class="rounded-2xl border border-dashed border-neutral-300 p-8 text-center text-neutral-600 bg-white">
                            Belum ada foto yang tersedia.
                        </div>
                    </div>
                @endforelse
            </div>

            @if ($photos->hasPages())
                <div class="mt-10 flex justify-center">
                    <nav class="inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                        @if ($photos->onFirstPage())
                            <span class="px-3 py-2 text-sm text-gray-400 bg-gray-100 rounded-l-md border border-gray-300 cursor-not-allowed">‹</span>
                        @else
                            <a href="{{ $photos->previousPageUrl() }}" class="px-3 py-2 text-sm text-gray-600 bg-white border border-gray-300 hover:bg-yellow-400 hover:text-black rounded-l-md">‹</a>
                        @endif

                        @foreach ($photos->links()->elements[0] ?? [] as $page => $url)
                            @if ($page == $photos->currentPage())
                                <span class="px-3 py-2 text-sm font-semibold bg-yellow-400 text-black border border-gray-300">{{ $page }}</span>
                            @else
                                <a href="{{ $url }}" class="px-3 py-2 text-sm text-gray-600 bg-white border border-gray-300 hover:bg-yellow-400 hover:text-black">{{ $page }}</a>
                            @endif
                        @endforeach

                        @if ($photos->hasMorePages())
                            <a href="{{ $photos->nextPageUrl() }}" class="px-3 py-2 text-sm text-gray-600 bg-white border border-gray-300 hover:bg-yellow-400 hover:text-black rounded-r-md">›</a>
                        @else
                            <span class="px-3 py-2 text-sm text-gray-400 bg-gray-100 rounded-r-md border border-gray-300 cursor-not-allowed">›</span>
                        @endif
                    </nav>
                </div>
            @endif

        </div>
    </section>
</x-public.main>