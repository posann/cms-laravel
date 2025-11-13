<x-public.main>

    @php
        $contactList = $contacts ?? collect();
        $activeId = isset($active) && $active?->id ? $active->id : ($contactList->first()->id ?? null);
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
                        <span class="text-xs sm:text-sm">Lokasi dan Kontak</span>
                    </div>
                    <h1 class="text-3xl md:text-4xl font-roboto font-bold text-primary-700 leading-tight">Lokasi dan Kontak</h1>
                    <p class="text-white/90 text-sm md:text-base">Kumpulan informasi Lokasi dan Kontak kami.</p>
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
                <span class="text-sm">Lokasi & Kontak</span>
            </div> --}}

            <!-- Mobile / Max-lg: Dropdown Select -->
            <div class="mb-6 lg:hidden">
                <label for="contact-select" class="block text-sm font-medium text-neutral-700 mb-2">Pilih Instansi</label>
                @if($contactList->isNotEmpty())
                    <select id="contact-select" class="w-full rounded-xl border-gray-300 bg-white py-3 px-4 text-sm font-semibold font-roboto shadow-sm focus:outline-none focus:ring-2 focus:ring-primary-700 valid:bg-primary-700">
                        @foreach($contactList as $c)
                            <option value="{{ $c->id }}" @selected($activeId === $c->id)>{{ $c->institution_name }}</option>
                        @endforeach
                    </select>
                @else
                    <select id="contact-select" class="w-full rounded-xl border-gray-300 bg-white py-3 px-4 text-sm font-roboto shadow-sm" disabled>
                        <option selected>Tidak ada data instansi</option>
                    </select>
                @endif
            </div>

            <div class="grid grid-cols-1 md:grid-cols-12 gap-6">

                <!-- Sidebar Instansi nav (Shown on lg and above) -->
                <aside class="md:col-span-3 hidden lg:block">
                    <div class="flex flex-col gap-3">
                        @forelse($contactList as $c)
                            @php $isActive = $activeId === $c->id; @endphp
                            <button type="button"
                                data-contact-trigger
                                data-contact-id="{{ $c->id }}"
                                class="w-full text-left rounded-2xl px-4 py-4 font-roboto font-semibold shadow-sm transition-colors {{ $isActive ? 'bg-primary-700 text-neutral-900' : 'bg-gray-100 text-neutral-800 hover:bg-neutral-200' }}">
                                {{ $c->institution_name }}
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

                    <!-- Map - Pre-render all maps and toggle client-side -->
                    @if($contactList->isNotEmpty())
                        @foreach($contactList as $c)
                            <div class="rounded-2xl overflow-hidden shadow-sm contact-content {{ $activeId === $c->id ? '' : 'hidden' }}" data-contact-id="{{ $c->id }}">
                                @if(!empty($c?->map_embed))
                                    <div class="iframe-contact">{!! $c->map_embed !!}</div>
                                @else
                                    <iframe
                                        class="w-full h-64 sm:h-80 lg:h-96"
                                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.525148459791!2d106.8223392750146!3d-6.193091460693379!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f5c53f8b26a3%3A0x2e9e3d1e95a9b0dd!2sMonumen%20Nasional%20(Monas)!5e0!3m2!1sen!2sid!4v1700000000000!5m2!1sen!2sid"
                                        style="border:0;"
                                        allowfullscreen=""
                                        loading="lazy"
                                        referrerpolicy="no-referrer-when-downgrade"
                                    ></iframe>
                                @endif
                            </div>
                        @endforeach
                    @else
                        <div class="rounded-2xl overflow-hidden shadow-sm">
                            <iframe
                                class="w-full h-64 sm:h-80 lg:h-96"
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.525148459791!2d106.8223392750146!3d-6.193091460693379!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f5c53f8b26a3%3A0x2e9e3d1e95a9b0dd!2sMonumen%20Nasional%20(Monas)!5e0!3m2!1sen!2sid!4v1700000000000!5m2!1sen!2sid"
                                style="border:0;"
                                allowfullscreen=""
                                loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"
                            ></iframe>
                        </div>
                    @endif

                    <!-- Contact Text -->
                    <div class="mt-8">
                        <h3 class="text-2xl md:text-3xl font-bold text-neutral-900 font-roboto">Tim Kami Siap Dihubungi</h3>
                        <p class="text-neutral-600 font-roboto text-sm md:text-base mt-2 max-w-3xl">
                            Kami siap membantu Anda. Silakan hubungi kami melalui salah satu kontak di bawah ini untuk informasi lebih lanjut
                            atau pertanyaan seputar layanan kami.
                        </p>
                    </div>

                    <!-- Contact Items - Pre-render all and toggle client-side -->
                    @if($contactList->isNotEmpty())
                        @foreach($contactList as $c)
                            <div class="mt-6 space-y-6 contact-content {{ $activeId === $c->id ? '' : 'hidden' }}" data-contact-id="{{ $c->id }}">

                                <!-- Telp -->
                                <div class="flex items-start gap-4">
                                    <div class="w-10 h-10 rounded-lg bg-neutral-100 flex items-center justify-center">
                                        <svg class="w-6 h-6 text-neutral-700" viewBox="0 0 24 24" fill="none">
                                            <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.86 19.86 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6A19.86 19.86 0 0 1 2.08 4.18 2 2 0 0 1 4.06 2h3a2 2 0 0 1 2 1.72c.12.86.33 1.7.62 2.5a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.58-1.14a2 2 0 0 1 2.11-.45c.8.29 1.64.5 2.5.62A2 2 0 0 1 22 16.92z" fill="currentColor"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <div class="text-neutral-700 font-roboto font-semibold">Telp.</div>
                                        <div class="text-neutral-900 font-roboto text-lg">{{ $c->phone ?? '(021) 3804242' }}</div>
                                    </div>
                                </div>

                                <!-- Fax -->
                                <div class="flex items-start gap-4">
                                    <div class="w-10 h-10 rounded-lg bg-neutral-100 flex items-center justify-center">
                                        <svg class="w-6 h-6 text-neutral-700" viewBox="0 0 24 24" fill="none">
                                            <path d="M19 7V4a2 2 0 0 0-2-2H7a2 2 0 0 0-2 2v3" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            <rect x="3" y="7" width="18" height="13" rx="2" ry="2" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M7 10h10M7 14h10M7 18h6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <div class="text-neutral-700 font-roboto font-semibold">Fax</div>
                                        <div class="text-neutral-900 font-roboto text-lg">{{ $c->fax ?? '(021) 3507210' }}</div>
                                    </div>
                                </div>

                                <!-- Email -->
                                <div class="flex items-start gap-4">
                                    <div class="w-10 h-10 rounded-lg bg-neutral-100 flex items-center justify-center">
                                        <svg class="w-6 h-6 text-neutral-700" viewBox="0 0 24 24" fill="none">
                                            <path d="M4 4h16a2 2 0 0 1 2 2v0l-10 7L2 6v0a2 2 0 0 1 2-2Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M22 8.5V18a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V8.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <div class="text-neutral-700 font-roboto font-semibold">Email</div>
                                        <div class="text-neutral-900 font-roboto text-lg">{{ $c->email ?? 'setjen@esdm.go.id' }}</div>
                                    </div>
                                </div>

                            </div>
                        @endforeach
                    @else
                        <div class="mt-6 space-y-6">
                            <!-- Telp -->
                            <div class="flex items-start gap-4">
                                <div class="w-10 h-10 rounded-lg bg-neutral-100 flex items-center justify-center">
                                    <svg class="w-6 h-6 text-neutral-700" viewBox="0 0 24 24" fill="none">
                                        <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.86 19.86 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6A19.86 19.86 0 0 1 2.08 4.18 2 2 0 0 1 4.06 2h3a2 2 0 0 1 2 1.72c.12.86.33 1.7.62 2.5a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.58-1.14a2 2 0 0 1 2.11-.45c.8.29 1.64.5 2.5.62A2 2 0 0 1 22 16.92z" fill="currentColor"/>
                                    </svg>
                                </div>
                                <div>
                                    <div class="text-neutral-700 font-roboto font-semibold">Telp.</div>
                                    <div class="text-neutral-900 font-roboto text-lg">(021) 3804242</div>
                                </div>
                            </div>

                            <!-- Fax -->
                            <div class="flex items-start gap-4">
                                <div class="w-10 h-10 rounded-lg bg-neutral-100 flex items-center justify-center">
                                    <svg class="w-6 h-6 text-neutral-700" viewBox="0 0 24 24" fill="none">
                                        <path d="M19 7V4a2 2 0 0 0-2-2H7a2 2 0 0 0-2 2v3" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        <rect x="3" y="7" width="18" height="13" rx="2" ry="2" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M7 10h10M7 14h10M7 18h6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </div>
                                <div>
                                    <div class="text-neutral-700 font-roboto font-semibold">Fax</div>
                                    <div class="text-neutral-900 font-roboto text-lg">(021) 3507210</div>
                                </div>
                            </div>

                            <!-- Email -->
                            <div class="flex items-start gap-4">
                                <div class="w-10 h-10 rounded-lg bg-neutral-100 flex items-center justify-center">
                                    <svg class="w-6 h-6 text-neutral-700" viewBox="0 0 24 24" fill="none">
                                        <path d="M4 4h16a2 2 0 0 1 2 2v0l-10 7L2 6v0a2 2 0 0 1 2-2Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M22 8.5V18a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V8.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </div>
                                <div>
                                    <div class="text-neutral-700 font-roboto font-semibold">Email</div>
                                    <div class="text-neutral-900 font-roboto text-lg">setjen@esdm.go.id</div>
                                </div>
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
            var selectEl = document.getElementById('contact-select');
            var triggerButtons = document.querySelectorAll('[data-contact-trigger]');
            var panes = document.querySelectorAll('.contact-content');

            function showContact(id) {
                var idStr = String(id);
                panes.forEach(function (pane) {
                    if (pane.getAttribute('data-contact-id') === idStr) {
                        pane.classList.remove('hidden');
                    } else {
                        pane.classList.add('hidden');
                    }
                });

                triggerButtons.forEach(function (btn) {
                    var isActive = btn.getAttribute('data-contact-id') === idStr;
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
                    showContact(e.target.value);
                });
            }

            triggerButtons.forEach(function (btn) {
                btn.addEventListener('click', function () {
                    var id = btn.getAttribute('data-contact-id');
                    showContact(id);
                });
            });

            if (activeId) {
                showContact(activeId);
            }
        });
    </script>

</x-public.main>