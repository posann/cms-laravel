<x-public.main>

    @props(['news', 'listNews'])

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
                    <span class="text-xs sm:text-sm">Detail Berita</span>
                </div>
                <h1 class="text-3xl md:text-4xl font-roboto font-bold text-primary-700 leading-tight">
                    {{ $news->title }}</h1>

                <div class="flex flex-wrap gap-2 sm:gap-4 items-center mt-2 pb-[170px]">
                    <div
                        class="bg-primary-700 text-black/90 text-sm md:text-base font-roboto font-semibold p-2 rounded-md shadow-sm">
                        <span>{{ $news->updated_at->format('F j, Y') }}</span>
                    </div>
                    <div
                        class="text-gray-300 flex flex-row gap-1 items-center text-sm md:text-base font-roboto font-medium p-2 rounded-md shadow-sm">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path>
                            <path fill-rule="evenodd"
                                d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span>{{ $news->view_count }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @push('css')
        <style>
            /* Simple gallery styles */
            .news-gallery .main-image {
                height: 24rem;
            }

            @media (min-width: 768px) {
                .news-gallery .main-image {
                    height: 28rem;
                }
            }

            .thumbnail {
                min-width: 5rem;
                height: 3rem;
                overflow: hidden;
                border-radius: 0.375rem;
            }

            .thumbnail img {
                width: 100%;
                height: 100%;
                object-fit: cover;
                display: block;
            }

            .thumbnail.active {
                box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.2);
            }

            .gallery-nav-btn {
                background: rgba(255, 255, 255, 0.85);
            }
        </style>
    @endpush

    <div class="m-0 mx-auto w-full max-w-3xl relative z-10 -translate-y-20 news-gallery">
        <div class="relative overflow-hidden shadow-sm rounded-lg">
            <button type="button"
                class="absolute left-4 top-1/2 -translate-y-1/2 z-20 p-2 rounded-full gallery-nav-btn prev-btn"
                aria-label="Previous">‹</button>
            <button type="button"
                class="absolute right-4 top-1/2 -translate-y-1/2 z-20 p-2 rounded-full gallery-nav-btn next-btn"
                aria-label="Next">›</button>

            @php
                // Prepare a gallery collection for UI/demo purposes. If there are no or only one media,
                // duplicate the first image so the gallery UI shows multiple thumbnails.
                $galleryMedia = collect($news->media ?? []);

                if ($galleryMedia->count() === 0) {
                    $placeholder = (object) [
                        'original_url' => asset('images/berita/Dampingin Presiden Prabowo.png'),
                        'thumb_url' => asset('images/berita/Dampingin Presiden Prabowo.png'),
                        'name' => '',
                    ];
                    $galleryMedia = collect([$placeholder]);
                }

                // Duplicate first image until we have at least 4 items for demo/gallery UI
                while ($galleryMedia->count() < 4) {
                    $galleryMedia->push($galleryMedia->first());
                }

                $firstImage =
                    $galleryMedia->first()->original_url ?? asset('images/berita/Dampingin Presiden Prabowo.png');
                $firstAlt = $galleryMedia->first()->name ?? '';
            @endphp

            <img id="main-image" src="{{ $firstImage }}" alt="{{ $firstAlt }}"
                class="w-full object-cover main-image transition-transform duration-500">
        </div>

        <div class="mt-3 w-full">
            <div class="flex gap-2 overflow-x-auto items-center justify-center thumbnails">
                @foreach ($galleryMedia as $index => $media)
                    <button type="button" class="thumbnail border-2 border-transparent flex-shrink-0"
                        data-index="{{ $index }}" aria-label="Gambar {{ $index + 1 }}">
                        <img src="{{ $media->thumb_url ?? $media->original_url }}" alt="{{ $media->name ?? '' }}">
                    </button>
                @endforeach
            </div>
        </div>
    </div>

    <div class="m-0 mx-auto w-full py-8 px-4 sm:px-6 md:px-8 lg:px-12 xl:px-16 2xl:px-20">
        <div class="prose prose-lg w-full max-w-4xl mx-auto">
            {!! $news->content_html !!}
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

    <div class="my-4 py-4">
        <x-public.components.berita :news="$listNews" />
    </div>


    @push('js')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const images = @json($galleryMedia->pluck('original_url'));
                const thumbs = @json($galleryMedia->pluck('thumb_url'));
                const mainImage = document.getElementById('main-image');
                const thumbnails = document.querySelectorAll('.thumbnail');
                const prevBtn = document.querySelector('.prev-btn');
                const nextBtn = document.querySelector('.next-btn');
                const fallback = '{{ asset('images/berita/Dampingin Presiden Prabowo.png') }}';

                let current = 0;

                function update(index) {
                    if (!images || images.length === 0) {
                        mainImage.src = fallback;
                        return;
                    }

                    current = (index + images.length) % images.length;
                    mainImage.src = images[current] || fallback;

                    if (thumbnails && thumbnails.length) {
                        thumbnails.forEach((el, i) => {
                            if (i === current) {
                                el.classList.add('active');
                                el.classList.remove('border-transparent');
                                el.classList.add('border-primary-700');
                            } else {
                                el.classList.remove('active');
                                el.classList.remove('border-primary-700');
                                el.classList.add('border-transparent');
                            }
                        });
                        // keep active thumbnail visible
                        const activeEl = thumbnails[current];
                        if (activeEl && activeEl.scrollIntoView) {
                            activeEl.scrollIntoView({
                                behavior: 'smooth',
                                inline: 'center',
                                block: 'nearest'
                            });
                        }
                    }
                }

                if (thumbnails && thumbnails.length) {
                    thumbnails.forEach(btn => {
                        btn.addEventListener('click', function() {
                            const idx = parseInt(this.dataset.index, 10);
                            update(idx);
                        });
                    });
                    update(0);
                } else {
                    // no thumbnails: hide nav
                    if (prevBtn) prevBtn.style.display = 'none';
                    if (nextBtn) nextBtn.style.display = 'none';
                }

                if (prevBtn) {
                    prevBtn.addEventListener('click', function() {
                        update(current - 1);
                    });
                }
                if (nextBtn) {
                    nextBtn.addEventListener('click', function() {
                        update(current + 1);
                    });
                }

                document.addEventListener('keydown', function(e) {
                    if (e.key === 'ArrowLeft') update(current - 1);
                    if (e.key === 'ArrowRight') update(current + 1);
                });
            });
        </script>
    @endpush
</x-public.main>
