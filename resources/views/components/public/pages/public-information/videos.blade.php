<x-public.main>
    @props(['videos'])

    <section class="py-8 md:py-10 lg:py-12 bg-gray-100">
        <div class="px-4 sm:px-6 md:px-8 lg:px-12 xl:px-16 2xl:px-20">
            <div class="mb-8 gap-4 items-center justify-start flex flex-row">
                <strong class="text-sm">Beranda</strong>
                <span>&#9679;</span>
                <strong class="text-sm">Informasi Publik</strong>
                <span>&#9679;</span>
                <span class="text-sm">Video</span>
            </div>

            <div class="flex items-center justify-between mb-8">
                <div>
                    <h2 class="text-xl md:text-3xl lg:text-4xl font-bold text-gray-900 font-roboto">Video</h2>
                    <h4 class="md:text-xl text-sm font-semibold text-gray-600 font-roboto">
                        Kumpulan dokumentasi video kegiatan dan informasi publik.
                    </h4>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse ($videos as $item)
                    <article class="bg-white rounded-2xl overflow-hidden shadow-sm transition-all duration-300 group hover:bg-primary-700 hover:shadow-lg">
                        <div class="p-2">
                            <!-- Media -->
                            <div class="relative rounded-lg overflow-hidden bg-neutral-100">
                                @php
                                    $isEmbed = !empty($item->video_url) && \Illuminate\Support\Str::startsWith($item->video_url, ['http://', 'https://']);
                                @endphp
                                @if ($isEmbed)
                                    <div class="aspect-video w-full">
                                        <iframe
                                            src="{{ $item->video_url }}"
                                            class="w-full h-full"
                                            frameborder="0"
                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                            allowfullscreen
                                        ></iframe>
                                    </div>
                                @else
                                    <div class="aspect-video w-full flex items-center justify-center bg-neutral-200">
                                        <svg class="w-12 h-12 text-neutral-500" viewBox="0 0 24 24" fill="none">
                                            <path d="M8 5v14l11-7-11-7Z" fill="currentColor"/>
                                        </svg>
                                    </div>
                                @endif

                                <div class="absolute bottom-0 left-0">
                                    <span class="bg-neutral-900 text-primary-700 text-xs font-bold px-3 py-1.5 rounded-tr-lg font-roboto group-hover:bg-black group-hover:text-primary-700 transition-colors duration-300">
                                        VIDEO
                                    </span>
                                </div>
                            </div>

                            <!-- Content -->
                            <div class="p-3 pb-1">
                                <h3 class="text-lg font-bold text-gray-900 mb-2 leading-tight font-roboto group-hover:text-black transition-colors duration-300 line-clamp-3">
                                    {{ $item->title }}
                                </h3>
                                @if(!empty($item->description))
                                    <p class="text-sm mb-4 pb-4 self-start text-gray-700 line-clamp-3">{{ strip_tags($item->description) }}</p>
                                @else
                                    <p class="text-sm mb-4 pb-4 self-start">&nbsp;</p>
                                @endif

                                <div class="w-full h-px bg-gray-200 mb-2 group-hover:bg-black transition-colors duration-300"></div>
                                <div class="flex items-center justify-between text-sm text-gray-600 group-hover:text-black transition-colors duration-300">
                                    <div class="flex items-center gap-1 font-roboto font-medium">
                                        <span>{{ optional($item->published_at)->format('F j, Y') }}</span>
                                    </div>
                                    <div class="flex items-center gap-4">
                                        @if($isEmbed)
                                            <a href="{{ $item->video_url }}" target="_blank" rel="noopener">
                                                <div class="flex items-center justify-center rounded-md group-hover:bg-black w-8 h-8 transition-colors duration-300">
                                                    <svg class="w-4 h-4 text-black group-hover:text-white transition-colors duration-300" fill="currentColor" viewBox="0 0 20 20">
                                                        <path d="M6 4l10 6-10 6V4z"></path>
                                                    </svg>
                                                </div>
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                @empty
                    <div class="col-span-full">
                        <div class="rounded-2xl border border-dashed border-neutral-300 p-8 text-center text-neutral-600 bg-white">
                            Belum ada video yang tersedia.
                        </div>
                    </div>
                @endforelse
            </div>

            @if ($videos->hasPages())
                <div class="mt-10 flex justify-center">
                    <nav class="inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                        @if ($videos->onFirstPage())
                            <span class="px-3 py-2 text-sm text-gray-400 bg-gray-100 rounded-l-md border border-gray-300 cursor-not-allowed">‹</span>
                        @else
                            <a href="{{ $videos->previousPageUrl() }}" class="px-3 py-2 text-sm text-gray-600 bg-white border border-gray-300 hover:bg-yellow-400 hover:text-black rounded-l-md">‹</a>
                        @endif

                        @foreach ($videos->links()->elements[0] ?? [] as $page => $url)
                            @if ($page == $videos->currentPage())
                                <span class="px-3 py-2 text-sm font-semibold bg-yellow-400 text-black border border-gray-300">{{ $page }}</span>
                            @else
                                <a href="{{ $url }}" class="px-3 py-2 text-sm text-gray-600 bg-white border border-gray-300 hover:bg-yellow-400 hover:text-black">{{ $page }}</a>
                            @endif
                        @endforeach

                        @if ($videos->hasMorePages())
                            <a href="{{ $videos->nextPageUrl() }}" class="px-3 py-2 text-sm text-gray-600 bg-white border border-gray-300 hover:bg-yellow-400 hover:text-black rounded-r-md">›</a>
                        @else
                            <span class="px-3 py-2 text-sm text-gray-400 bg-gray-100 rounded-r-md border border-gray-300 cursor-not-allowed">›</span>
                        @endif
                    </nav>
                </div>
            @endif

        </div>
    </section>
</x-public.main>