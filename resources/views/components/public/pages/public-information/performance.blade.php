
<x-public.main>
    <section class="">
        <div class="relative w-full bg-neutral-600 py-12 px-4 sm:px-6 md:px-8 lg:px-12 xl:px-16 2xl:px-20">
            <div class="absolute inset-0 h-full bg-no-repeat bg-contain opacity-70" style="background-image:url('{{ asset('images/asset/header line asset.png') }}');"></div>
            <div class="max-w-[90rem] relative z-10">
                <div class="flex flex-col gap-2">
                    <div class="mb-4 sm:mb-6 gap-2 sm:gap-4 items-center justify-start flex flex-row flex-wrap text-white font-roboto">
                        <strong class="text-xs sm:text-sm">Beranda</strong>
                        <span class="text-xs sm:text-sm">&#9679;</span>
                        <strong class="text-xs sm:text-sm">Informasi Publik</strong>
                        <span class="text-xs sm:text-sm">&#9679;</span>
                        <span class="text-xs sm:text-sm">Kinerja</span>
                    </div>
                    <h1 class="text-3xl md:text-4xl font-roboto font-bold text-primary-700 leading-tight">Kinerja</h1>
                    <p class="text-white/90 text-sm md:text-base">Kumpulan dokumen kinerja yang dapat diunduh. Gunakan filter tahun untuk mempersempit hasil.</p>
                </div>
            </div>
        </div>

        <div class="relative mx-auto py-12 px-4 sm:px-6 md:px-8 lg:px-12 xl:px-16 2xl:px-20">

            <!-- Mobile: Dropdown Kategori -->
            <div class="mb-6 lg:hidden">
                <label for="performance-category-select" class="block text-sm font-medium text-neutral-700 mb-2">Pilih Kategori</label>
                @if(($categories ?? collect())->isNotEmpty())
                    <select id="performance-category-select" class="w-full rounded-xl border-gray-300 bg-white py-3 px-4 text-sm font-semibold font-roboto shadow-sm focus:outline-none focus:ring-2 focus:ring-primary-700">
                        @foreach($categories as $c)
                            <option value="{{ $c->name }}" @selected(optional($active)->id === $c->id)>{{ $c->name }}</option>
                        @endforeach
                    </select>
                    <script>
                        document.addEventListener('DOMContentLoaded', function () {
                            var sel = document.getElementById('performance-category-select');
                            if (sel) {
                                sel.addEventListener('change', function (e) {
                                    var name = e.target.value;
                                    var url = new URL(window.location.href);
                                    if (name) url.searchParams.set('category', name);
                                    window.location.href = url.toString();
                                });
                            }
                        });
                    </script>
                @else
                    <select id="performance-category-select" class="w-full rounded-xl border-gray-300 bg-white py-3 px-4 text-sm font-roboto shadow-sm" disabled>
                        <option selected>Tidak ada kategori</option>
                    </select>
                @endif
            </div>

            <div class="grid grid-cols-1 md:grid-cols-12 gap-6">

                <!-- Sidebar Kategori (lg+) -->
                <aside class="md:col-span-3 hidden lg:block">
                    <div class="flex flex-col gap-3">
                        @forelse(($categories ?? collect()) as $c)
                            @php $isActive = optional($active)->id === $c->id; @endphp
                            <a href="{{ route('public-information.performance', ['category' => $c->name, 'year' => request('year')]) }}"
                               class="block rounded-2xl px-4 py-4 font-roboto font-semibold shadow-sm transition-colors {{ $isActive ? 'bg-primary-700 text-neutral-900' : 'bg-gray-100 text-neutral-800 hover:bg-neutral-200' }}">
                                {{ $c->name }}
                            </a>
                        @empty
                            <div class="block rounded-2xl px-4 py-4 font-roboto font-semibold bg-gray-100 text-neutral-800 shadow-sm">
                                Tidak ada kategori
                            </div>
                        @endforelse
                    </div>
                </aside>

                <!-- Konten Dokumen -->
                <div class="col-span-full lg:col-span-9">

                    <!-- Toolbar: Filter Tahun -->
                    <div class="mb-6 flex items-center justify-end">
                        @if(($availableYears ?? collect())->isNotEmpty())
                            <div class="w-44 sm:w-56">
                                <label for="year-filter" class="sr-only">Filter Tahun</label>
                                <select id="year-filter" class="w-full rounded-xl border-gray-300 bg-white py-3 px-4 text-sm font-semibold font-roboto shadow-sm focus:outline-none focus:ring-2 focus:ring-primary-700">
                                    <option value="" @selected(empty($selectedYear))>Semua Tahun</option>
                                    @foreach($availableYears as $year)
                                        <option value="{{ $year }}" @selected(isset($selectedYear) && (int)$selectedYear === (int)$year)>{{ $year }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <script>
                                document.addEventListener('DOMContentLoaded', function () {
                                    var sel = document.getElementById('year-filter');
                                    if (sel) {
                                        sel.addEventListener('change', function (e) {
                                            var year = e.target.value;
                                            var url = new URL(window.location.href);
                                            if (year) {
                                                url.searchParams.set('year', year);
                                            } else {
                                                url.searchParams.delete('year');
                                            }
                                            window.location.href = url.toString();
                                        });
                                    }
                                });
                            </script>
                        @endif
                    </div>

                    @if(($documents ?? collect())->count())
                        <div class="space-y-6">
                            @foreach($documents as $doc)
                                <div class="border-b border-gray-200 pb-6">
                                    <div class="flex flex-col sm:flex-row sm:items-start sm:justify-between gap-4">
                                        <!-- Left: Icon + Content -->
                                        <div class="flex items-start gap-3 sm:gap-4 flex-1 min-w-0">
                                            <!-- Icon -->
                                            <div class="flex-none w-12 h-12 rounded-lg bg-neutral-100 border border-gray-300 flex items-center justify-center self-center">
                                                <svg class="w-8 h-8 text-neutral-700" viewBox="0 0 24 24" fill="none">
                                                    <path d="M7 3h6l5 5v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/>
                                                    <path d="M13 3v5h5" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/>
                                                </svg>
                                            </div>

                                            <!-- Content -->
                                            <div class="flex-1 min-w-0">
                                                <!-- Meta -->
                                                <div class="flex flex-wrap items-center gap-x-4 gap-y-1 text-[11px] sm:text-xs text-gray-600 font-roboto uppercase tracking-wide">
                                                    @php
                                                        $dateText = $doc->published_at ? \Illuminate\Support\Carbon::parse($doc->published_at)->translatedFormat('l, j F Y') : '-';
                                                    @endphp
                                                    <span class="inline-flex items-center gap-1.5">
                                                        <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none">
                                                            <path d="M8 2v4M16 2v4M4 10h16M6 6h12a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                        </svg>
                                                        {{ strtoupper($dateText) }}
                                                    </span>
                                                    <span class="hidden sm:inline">&#9679;</span>
                                                    <span class="inline-flex items-center gap-1.5">
                                                        <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none">
                                                            <path d="M12 3v10m0 0l4-4m-4 4l-4-4M4 21h16" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                        </svg>
                                                        {{ number_format((int)$doc->download_count, 0, ',', '.') }} kali diunduh
                                                    </span>
                                                </div>

                                                <!-- Title -->
                                                <h3 class="mt-1 sm:mt-2 text-base font-semibold text-gray-900 font-roboto">
                                                    <a href="{{ $doc->download_url ? route('public-information.performance.download', $doc->title) : '#' }}" target="_blank" class="hover:text-primary-700 transition-colors duration-300 line-clamp-2">
                                                        {{ $doc->title }}
                                                    </a>
                                                </h3>
                                            </div>
                                        </div>

                                        <!-- Right: Actions -->
                                        <div class="flex items-center gap-3 self-center max-sm:w-full">
                                            <a href="{{ $doc->download_url ? route('public-information.performance.download', $doc->title) : '#' }}"
                                               target="_blank" class="max-sm:w-full flex items-center justify-center text-base font-medium gap-2 px-4 py-2 rounded-full border bg-gray-100 hover:border-primary-700 hover:bg-primary-700 hover:text-black transition-all duration-300 @if(!$doc->download_url) pointer-events-none opacity-50 @endif"
                                               @if(!$doc->download_url) aria-disabled="true" @endif
                                            >
                                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm3.293-7.707a1 1 0 011.414 0L9 10.586V3a1 1 0 112 0v7.586l1.293-1.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                                </svg>
                                                Detail
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <!-- Pagination -->
                        <div class="mt-6">
                            {{ $documents->onEachSide(1)->links() }}
                        </div>
                    @else
                        <div class="rounded-2xl border border-dashed border-neutral-300 p-8 text-center text-neutral-600">
                            Tidak ada dokumen pada filter/kategori ini.
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </section>
</x-public.main>