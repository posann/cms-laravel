<x-public.main>

    @props(['item', 'related'])

    <div class="relative w-full bg-neutral-600 py-12 px-4 sm:px-6 md:px-8 lg:px-12 xl:px-16 2xl:px-20">
        <div class="absolute inset-0 h-full bg-no-repeat bg-contain opacity-70"
             style="background-image:url('{{ asset('images/asset/header line asset.png') }}');"></div>
        <div class="max-w-[90rem] relative z-10">
            <div class="flex flex-col gap-2">
                <div class="mb-4 sm:mb-6 gap-2 sm:gap-4 items-center justify-start flex flex-row flex-wrap text-white font-roboto">
                    <strong class="text-xs sm:text-sm">Beranda</strong>
                    <span class="text-xs sm:text-sm">&#9679;</span>
                    <strong class="text-xs sm:text-sm">Informasi Publik</strong>
                    <span class="text-xs sm:text-sm">&#9679;</span>
                    <span class="text-xs sm:text-sm">Video</span>
                </div>

                <h1 class="text-3xl md:text-4xl font-roboto font-bold text-primary-700 leading-tight">
                    {{ $item->title }}
                </h1>

                <div class="flex flex-wrap gap-2 sm:gap-4 items-center mt-3 pb-10">
                    <div class="bg-primary-700 text-black/90 text-sm md:text-base font-roboto font-semibold px-3 py-1.5 rounded-md shadow-sm">
                        <span>{{ optional($item->published_at)->format('F j, Y') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Featured Video -->
    <div class="m-0 mx-auto w-full max-w-4xl overflow-hidden shadow-sm rounded-2xl relative z-10 -mt-16">
        @php
            $isEmbed = !empty($item->video_url) && \Illuminate\Support\Str::startsWith($item->video_url, ['http://', 'https://']);
        @endphp
        @if($isEmbed)
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
    </div>

    <!-- Content -->
    <div class="m-0 mx-auto w-full py-8 px-4 sm:px-6 md:px-8 lg:px-12 xl:px-16 2xl:px-20">
        <div class="max-w-4xl mx-auto space-y-6">
            @if(!empty($item->content_overview))
                <p class="text-lg text-neutral-700 font-roboto">
                    {{ strip_tags($item->content_overview) }}
                </p>
            @endif

            @if(!empty($item->content_raw))
                <div class="prose prose-lg w-full max-w-none">
                    {!! $item->content_raw !!}
                </div>
            @endif

            @if(!empty($item->description) && empty($item->content_raw))
                <p class="text-base text-neutral-700 font-roboto">
                    {{ strip_tags($item->description) }}
                </p>
            @endif
        </div>
    </div>

    <!-- Related -->
    @if(($related ?? collect())->isNotEmpty())
        <div class="m-0 mx-auto w-full py-6 px-4 sm:px-6 md:px-8 lg:px-12 xl:px-16 2xl:px-20">
            <h2 class="text-xl md:text-2xl font-bold text-gray-900 font-roboto mb-4">Video Terkait</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($related as $item)
                    <article class="bg-white rounded-2xl overflow-hidden shadow-sm transition-all duration-300 group hover:bg-primary-700 hover:shadow-lg">
                        <div class="p-2">
                            <div class="relative rounded-lg overflow-hidden bg-neutral-100">
                                @php
                                    $isRelEmbed = !empty($item->video_url) && \Illuminate\Support\Str::startsWith($item->video_url, ['http://', 'https://']);
                                @endphp
                                @if ($isRelEmbed)
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

                            <div class="p-3 pb-1">
                                <h3 class="text-base font-bold text-gray-900 mb-2 leading-tight font-roboto group-hover:text-black transition-colors duration-300 line-clamp-2">
                                    {{ $item->title }}
                                </h3>

                                <div class="w-full h-px bg-gray-200 mb-2 group-hover:bg-black transition-colors duration-300"></div>
                                <div class="flex items-center justify-between text-sm text-gray-600 group-hover:text-black transition-colors duration-300">
                                    <div class="flex items-center gap-1 font-roboto font-medium">
                                        <span>{{ optional($item->published_at)->format('F j, Y') }}</span>
                                    </div>
                                    <div class="flex items-center gap-4">
                                        <a href="{{ route('public-information.videos.show', $item->slug) }}">
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
                @endforeach
            </div>
        </div>
    @endif

</x-public.main>