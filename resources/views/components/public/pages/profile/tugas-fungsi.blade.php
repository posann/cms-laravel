<x-public.main>

    @php
        $tfList = $taskFunctions ?? collect();
        $activeId = isset($active) && $active?->id ? $active->id : ($tfList->first()->id ?? null);
    @endphp

    <section class="">
        <div class="relative w-full bg-neutral-600 py-12 px-4 sm:px-6 md:px-8 lg:px-12 xl:px-16 2xl:px-20">
            <div class="absolute inset-0 h-full bg-no-repeat bg-contain opacity-70" style="background-image:url('{{ asset('images/asset/header line asset.png') }}');"></div>
            <div class="max-w-[90rem] relative z-10">
                <div class="flex flex-col gap-2">
                    <div class="mb-4 sm:mb-6 gap-2 sm:gap-4 items-center justify-start flex flex-row flex-wrap text-white font-roboto">
                        <strong class="text-xs sm:text-sm">Beranda</strong>
                        <span class="text-xs sm:text-sm">&#9679;</span>
                        <strong class="text-xs sm:text-sm">Profil</strong>
                        <span class="text-xs sm:text-sm">&#9679;</span>
                        <span class="text-xs sm:text-sm">Tugas & Fungsi</span>
                    </div>
                    <h1 class="text-3xl md:text-4xl font-roboto font-bold text-primary-700 leading-tight">Tugas & Fungsi</h1>
                    <p class="text-white/90 text-sm md:text-base">Kumpulan informasi Tugas, Fungsi, dan Ruang Lingkup setiap instansi.</p>
                </div>
            </div>
        </div>

        <div class="relative mx-auto py-12 px-4 sm:px-6 md:px-8 lg:px-12 xl:px-16 2xl:px-20">

            {{-- <!-- Breadcrumb -->
            <div class="mb-8 gap-4 items-center justify-start flex flex-row">
                <strong class="text-sm">Beranda</strong>
                <span>&#9679;</span>
                <strong class="text-sm">Profil</strong>
                <span>&#9679;</span>
                <span class="text-sm">Tugas & Fungsi</span>
            </div> --}}

            <!-- Mobile / Max-lg: Dropdown Select -->
            <div class="mb-6 lg:hidden">
                <label for="tf-select" class="block text-sm font-medium text-neutral-700 mb-2">Pilih Instansi</label>
                @if($tfList->isNotEmpty())
                    <select id="tf-select" class="w-full rounded-xl border-gray-300 bg-white py-3 px-4 text-sm font-semibold font-roboto shadow-sm focus:outline-none focus:ring-2 focus:ring-primary-700 valid:bg-primary-700">
                        @foreach($tfList as $item)
                            <option value="{{ $item->id }}" @selected($activeId === $item->id)>{{ $item->institution_name }}</option>
                        @endforeach
                    </select>
                @else
                    <select id="tf-select" class="w-full rounded-xl border-gray-300 bg-white py-3 px-4 text-sm font-roboto shadow-sm" disabled>
                        <option selected>Tidak ada data instansi</option>
                    </select>
                @endif
            </div>

            <div class="grid grid-cols-1 md:grid-cols-12 gap-6">

                <!-- Sidebar Instansi nav (Shown on lg and above) -->
                <aside class="md:col-span-3 hidden lg:block">
                    <div class="flex flex-col gap-3">
                        @forelse($tfList as $item)
                            @php $isActive = $activeId === $item->id; @endphp
                            <button type="button"
                                data-tf-trigger
                                data-tf-id="{{ $item->id }}"
                                class="w-full text-left rounded-2xl px-4 py-4 font-roboto font-semibold shadow-sm transition-colors {{ $isActive ? 'bg-primary-700 text-neutral-900' : 'bg-gray-100 text-neutral-800 hover:bg-neutral-200' }}">
                                {{ $item->institution_name }}
                            </button>
                        @empty
                            <div class="block rounded-2xl px-4 py-4 font-roboto font-semibold bg-gray-100 text-neutral-800 shadow-sm">
                                Kementerian ESDM
                            </div>
                        @endforelse
                    </div>
                </aside>

                <!-- Konten-->
                <div class="col-span-full lg:col-span-9">
                    @if($tfList->isNotEmpty())
                        @foreach($tfList as $item)
                            <div class="rounded-2xl overflow-hidden shadow-sm tf-pane {{ $activeId === $item->id ? '' : 'hidden' }}" data-tf-id="{{ $item->id }}">
                                <div class="px-6 sm:px-8">
                                    <div class="mb-3">
                                        <h3 class="text-2xl md:text-3xl font-bold text-neutral-900 font-roboto">{{ $item->institution_name }}</h3>
                                    </div>
                                    <!-- Intro -->
                                    @if(!empty($item->intro))
                                        <div class="prose max-w-none">
                                            {!! $item->intro !!}
                                        </div>
                                    @else
                                        <p class="text-neutral-700 font-roboto text-sm md:text-base">
                                            Informasi Tugas, Fungsi, dan Ruang Lingkup {{ $item->institution_name }}.
                                        </p>
                                    @endif

                                    <!-- Tugas -->
                                    <div class="mt-8">
                                        <h3 class="text-xl md:text-2xl font-bold text-neutral-900 font-roboto">Tugas {{ $item->institution_name }}</h3>
                                        <div class="mt-3 prose max-w-none">
                                            {!! $item->tugas ?? '<p class="text-neutral-600">Belum ada konten tugas.</p>' !!}
                                        </div>
                                    </div>

                                    <!-- Fungsi -->
                                    <div class="mt-8">
                                        <h3 class="text-xl md:text-2xl font-bold text-neutral-900 font-roboto">Fungsi {{ $item->institution_name }}</h3>
                                        <div class="mt-3 prose max-w-none">
                                            {!! $item->fungsi ?? '<p class="text-neutral-600">Belum ada konten fungsi.</p>' !!}
                                        </div>
                                    </div>

                                    <!-- Ruang Lingkup -->
                                    <div class="mt-8">
                                        <h3 class="text-xl md:text-2xl font-bold text-neutral-900 font-roboto">Ruang Lingkup {{ $item->institution_name }}</h3>
                                        <div class="mt-3 prose max-w-none">
                                            {!! $item->ruang_lingkup ?? '<p class="text-neutral-600">Belum ada konten ruang lingkup.</p>' !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="rounded-2xl overflow-hidden shadow-sm">
                            <div class="p-6 sm:p-8">
                                <p class="text-neutral-700 font-roboto text-sm md:text-base">
                                    Belum ada data Tugas & Fungsi yang tersedia.
                                </p>
                            </div>
                        </div>
                    @endif
                </div>

            </div>

        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var activeId = "{{ $activeId }}";
            var selectEl = document.getElementById('tf-select');
            var triggerButtons = document.querySelectorAll('[data-tf-trigger]');
            var panes = document.querySelectorAll('.tf-pane');

            function showPane(id) {
                var idStr = String(id);
                panes.forEach(function (pane) {
                    pane.classList.toggle('hidden', pane.getAttribute('data-tf-id') !== idStr);
                });

                triggerButtons.forEach(function (btn) {
                    var isActive = btn.getAttribute('data-tf-id') === idStr;
                    btn.classList.toggle('bg-primary-700', isActive);
                    btn.classList.toggle('text-neutral-900', isActive);
                    btn.classList.toggle('bg-gray-100', !isActive);
                    btn.classList.toggle('text-neutral-800', !isActive);
                });

                if (selectEl) {
                    selectEl.value = idStr;
                }
            }

            if (selectEl) {
                selectEl.addEventListener('change', function (e) {
                    showPane(e.target.value);
                });
            }

            triggerButtons.forEach(function (btn) {
                btn.addEventListener('click', function () {
                    var id = btn.getAttribute('data-tf-id');
                    showPane(id);
                });
            });

            if (activeId) {
                showPane(activeId);
            }
        });
    </script>

</x-public.main>