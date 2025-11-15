<x-public.main>
    @props(['pers'])

    <div class="relative w-full h-[30%] bg-neutral-600 py-12 px-4 sm:px-6 md:px-8 lg:px-12 xl:px-16 2xl:px-20">
        <div class="absolute inset-0 h-full bg-no-repeat bg-contain opacity-70"
            style="background-image:url('{{ asset('images/asset/header line asset.png') }}');"></div>
        <div class="max-w-[90rem] relative z-10">
            <div class="flex flex-col gap-2">
                <div
                    class="mb-4 sm:mb-6 gap-2 sm:gap-4 items-center justify-start flex flex-row flex-wrap text-white font-roboto">
                    <strong class="text-xs sm:text-sm">Beranda</strong>
                    <span class="text-xs sm:text-sm">&#9679;</span>
                    <strong class="text-xs sm:text-sm">Berita</strong>
                    <span class="text-xs sm:text-sm">&#9679;</span>
                    <span class="text-xs sm:text-sm">Berita</span>
                </div>
                <h1 class="text-3xl md:text-4xl font-roboto font-bold text-primary-700 leading-tight">
                    {{ $pers->title }}</h1>

                <div class="flex flex-wrap gap-2 sm:gap-4 items-center mt-2 pb-[170px]">
                    <div
                        class="bg-primary-700 text-black/90 text-sm font-roboto font-semibold p-2 rounded-md shadow-sm">
                        <span>{{ $pers->updated_at->format('F j, Y') }}</span>
                    </div>
                    <div
                        class="text-gray-300 flex flex-row gap-1 items-center text-sm font-roboto font-medium p-2 rounded-md shadow-sm">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path>
                            <path fill-rule="evenodd"
                                d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span>{{ $pers->view_count }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div
        class="m-0 mx-auto h-96 w-full max-w-3xl overflow-hidden shadow-sm rounded-lg 
    relative z-10 -translate-y-20">
        <img src="{{ count($pers->media) > 0 ? $pers->media[0]->original_url : asset('images/berita/Dampingin Presiden Prabowo.png') }}"
            alt="{{ count($pers->media) > 0 ? $pers->media[0]->name : '' }}"
            class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
    </div>

    <div class="m-0 mx-auto w-full py-8 px-4 sm:px-6 md:px-8 lg:px-12 xl:px-16 2xl:px-20">
        <div class="prose prose-lg w-full max-w-4xl mx-auto">
            {!! $pers->content_raw !!}
        </div>
    </div>

    <div class="m-0 mx-auto flex my-6 flex-row justify-center items-center gap-4">
        <span class="font-roboto font-semibold">Bagikan berita ini</span>
        <div class="flex flex-row gap-4">
            {{-- COPY LINK --}}
            <div class="bg-primary-300 p-2 rounded-md cursor-pointer shadow-sm">
                <a href="#" class="text-black bg-primary-300 hover:black transition-colors duration-300">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M3.9 12c0-1.71 1.39-3.1 3.1-3.1h4v-2H7c-2.76 0-5 2.24-5 5s2.24 5 5 5h4v-2H7c-1.71 0-3.1-1.39-3.1-3.1zM8 13h8v-2H8v2zm9-6h-4v2h4c1.71 0 3.1 1.39 3.1 3.1s-1.39 3.1-3.1 3.1h-4v2h4c2.76 0 5-2.24 5-5s-2.24-5-5-5z" />
                    </svg>
                </a>
            </div>

            {{-- FACEBOOK --}}
            <div class="bg-primary-300 p-2 rounded-md cursor-pointer shadow-sm">
                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}"
                    target="_blank" rel="noopener noreferrer"
                    class="text-black bg-primary-300 hover:black transition-colors duration-300">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M22.675 0h-21.35C.597 0 0 .597 0 1.325v21.351C0 23.403.597 24 1.325 24H12.82v-9.294H9.692v-3.622h3.128V8.413c0-3.1 1.894-4.788 4.659-4.788 1.325 0 2.466.099 2.797.143v3.24l-1.918.001c-1.504 0-1.796.715-1.796 1.763v2.313h3.587l-.467 3.622h-3.12V24h6.116C23.403 24 24 23.403 24 22.676V1.325C24 .597 23.403 0 22.675 0z" />
                    </svg>
                </a>
            </div>
        </div>
    </div>

    {{-- <div class="my-4 py-4">
        <x-public.components.berita :news="$listNews" />
    </div> --}}


    <script>
        console.log(@json($pers));
    </script>
</x-public.main>
