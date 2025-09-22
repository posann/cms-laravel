@props(['item'])

<article
    class="relative bg-gray-100 rounded-2xl overflow-hidden shadow-sm transition-all duration-300 group hover:shadow-lg p-6 pb-3 flex flex-col min-h-[280px]">
    <!-- Background Image (hidden by default) -->
    <div class="absolute inset-0 bg-cover bg-center opacity-0 group-hover:opacity-100 transition-opacity duration-500"
        style="background-image: url('{{ count($item->media) > 0 ? $item->media[0]->original_url : asset('images/berita/Dampingin Presiden Prabowo.png') }}');">
    </div>

    <!-- Overlay biar teks tetap terbaca -->
    <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>

    <!-- Content -->
    <div class="relative z-10 flex flex-col flex-1">
        <!-- Category Badge -->
        <div class="mb-4">
            <span
                class="bg-primary-700 text-black text-xs font-bold px-3 py-1.5 rounded font-roboto group-hover:bg-black group-hover:text-primary-700 transition-colors duration-300">
                SIARAN PERS
            </span>
        </div>

        <script>
            console.log(@json($item));
        </script>

        <!-- Title + Description -->
        <div class="flex-1">
            <h3
                class="text-lg font-bold text-gray-900 leading-tight font-roboto group-hover:text-white transition-colors duration-300 mb-4">
                {{ $item->title }}
            </h3>
            <p
                class="text-sm text-gray-600 leading-relaxed font-roboto group-hover:text-white transition-colors duration-300">
                {{ $item->content_overview }}
            </p>
        </div>

        <!-- Divider -->
        <div class="w-full h-px bg-gray-200 mb-3 group-hover:bg-white/50 transition-colors duration-300"></div>

        <!-- Metadata -->
        <div
            class="flex items-center justify-between text-sm text-gray-600 group-hover:text-white transition-colors duration-300">
            <div class="flex items-center gap-1 font-roboto font-medium">
                <span>{{ $item->updated_at->format('F j, Y') }}</span>
            </div>
            <div class="flex items-center gap-2 font-roboto font-medium">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path>
                    <path fill-rule="evenodd"
                        d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                        clip-rule="evenodd"></path>
                </svg>
                <span>{{ $item->view_count }}</span>
            </div>
            <div class="flex items-center justify-center w-8 h-8 transition-colors duration-300">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
            </div>
        </div>
    </div>
</article>
