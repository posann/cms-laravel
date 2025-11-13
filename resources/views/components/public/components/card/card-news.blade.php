@props(['item'])

<article
    class="bg-white max-w-sm h-[30rem] rounded-2xl overflow-hidden shadow-sm transition-all duration-300 group hover:bg-primary-700 hover:shadow-lg p-2 flex flex-col">
    <div class="relative h-[16rem] overflow-hidden rounded-lg">
        <img src="{{ count($item->media) > 0 ? $item->media[0]->original_url : asset('images/berita/Dampingin Presiden Prabowo.png') }}"
            alt="{{ count($item->media) > 0 ? $item->media[0]->name : '' }}"
            class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">

        <div class="absolute bottom-0 left-0">
            <span
                class="bg-neutral-900 text-primary-700 text-xs font-bold px-3 py-1.5 rounded-tr-lg font-roboto group-hover:bg-black group-hover:text-primary-700 transition-colors duration-300">
                {{ $item->category->name }}
            </span>
        </div>
    </div>

    <div class="p-3 pb-1 flex flex-col flex-1 ">
        <div class="flex-1 flex flex-col justify-between">
            <h3
                class="text-lg font-bold text-gray-900 mb-2 leading-tight font-roboto group-hover:text-black transition-colors duration-300 line-clamp-3">
                {{ $item->title }}
            </h3>
            <p class="text-sm mb-4 pb-4 self-start">{{ $item->content_overview }}</p>
        </div>
        <script>
            console.log(@json($item));
        </script>


        <div>
            <div class="w-full h-px bg-gray-200 mb-2 group-hover:bg-black transition-colors duration-300">
            </div>
            <div
                class="flex items-center justify-between text-sm text-gray-600 group-hover:text-black transition-colors duration-300">
                <div class="flex items-center gap-1 font-roboto font-medium">
                    <span>{{ $item->updated_at->format('F j, Y') }}</span>
                </div>
                <div class="flex items-center gap-4">
                    <div class="flex items-center gap-2 font-roboto font-medium">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path>
                            <path fill-rule="evenodd"
                                d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span>{{ $item->view_count }}</span>
                    </div>
                    <a href="{{ route(name: 'news.show', parameters: $item->slug) }}">
                        <div
                            class="flex items-center justify-center rounded-md group-hover:bg-black w-8 h-8 transition-colors duration-300">
                            <div
                                class="flex items-center justify-center rounded-md group-hover:bg-black w-8 h-8 transition-colors duration-300">
                                <svg class="w-4 h-4 text-black group-hover:text-white transition-colors duration-300"
                                    fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0
                                        010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586
                                        11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1
                                        0 010-1.414z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</article>
