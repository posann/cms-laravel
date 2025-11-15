<header class="bg-white shadow-sm border-b border-gray-200 sticky top-0 z-50">
    <div class="mx-auto pl-4 sm:pl-6 2xl:pl-20 max-h-20">
        <div class="flex items-center justify-between h-20 ">

            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <a href="{{ route('home') }}">
                        <img class="" src="{{ asset('images/logo-esdm.png') }}" alt="ESDM Logo">
                    </a>
                </div>
            </div>


            <nav class="hidden md:block">
                <div class="ml-10 flex items-baseline space-x-8">
                    <!-- Profil dengan dropdown -->
                    <div class="relative group">
                        <a href="#"
                            class="text-gray-800 px-3 py-2 text-[0.9rem] font-bold font-roboto transition-colors duration-200">
                            Profil
                        </a>
                        <!-- Dropdown -->
                        <div
                            class="absolute left-0 top-full p-4 mt-0 w-[22rem] bg-white rounded-md opacity-0 group-hover:opacity-100 group-hover:translate-y-0 transform translate-y-1 transition-all duration-200 pointer-events-none group-hover:pointer-events-auto z-50">
                            <div class="flex flex-row items-center justify-center gap-2">
                                <div class="flex flex-col w-full gap-2">
                                    <a href="{{ route('profil.sejarah') }}"
                                        class="block text-gray-600 p-2 text-[0.8rem] font-semibold font-roboto transition-colors duration-200 hover:bg-gray-100">Sejarah</a>
                                    <a href="{{ route('profil.visi-misi') }}"
                                        class="block text-gray-600 p-2 text-[0.8rem] font-semibold font-roboto transition-colors duration-200 hover:bg-gray-100">Visi
                                        & Misi</a>
                                    <a href="{{ route('profil.makna-logo') }}"
                                        class="block text-gray-600 p-2 text-[0.8rem] font-semibold font-roboto transition-colors duration-200 hover:bg-gray-100">Makna
                                        Logo</a>
                                    <a href="{{ route('profil.tugas-fungsi') }}"
                                        class="block text-gray-600 p-2 text-[0.8rem] font-semibold font-roboto transition-colors duration-200 hover:bg-gray-100">Tugas
                                        Fungsi</a>
                                </div>
                                <div class="flex flex-col w-full gap-2">
                                    <a href="{{ route('profil.struktur-organisasi') }}"
                                        class="block text-gray-600 p-2 text-[0.8rem] font-semibold font-roboto transition-colors duration-200 hover:bg-gray-100">Struktur
                                        Organisasi</a>
                                    <a href="{{ route('profil.profile-menteri') }}"
                                        class="block text-gray-600 p-2 text-[0.8rem] font-semibold font-roboto transition-colors duration-200 hover:bg-gray-100">Profil
                                        Menteri</a>
                                    <a href="{{ route('profil.daftar-pejabat') }}"
                                        class="block text-gray-600 p-2 text-[0.8rem] font-semibold font-roboto transition-colors duration-200 hover:bg-gray-100">Daftar
                                        Pejabat</a>
                                    <a href="{{ route('profil.lokasi-kontak') }}"
                                        class="block text-gray-600 p-2 text-[0.8rem] font-semibold font-roboto transition-colors duration-200 hover:bg-gray-100">Lokasi
                                        dan Kontak</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="relative group">
                        <a href="#"
                            class="text-gray-800 px-3 py-2 text-[0.9rem] font-bold font-roboto transition-colors duration-200">
                            Informasi Publik
                        </a>
                        <div
                            class="absolute left-0 top-full p-4 mt-0 w-[22rem] bg-white rounded-md opacity-0 group-hover:opacity-100 group-hover:translate-y-0 transform translate-y-1 transition-all duration-200 pointer-events-none group-hover:pointer-events-auto z-50">
                            <div class="flex flex-row items-center justify-center gap-2">
                                <div class="flex flex-col w-full gap-2">
                                    <a href="#"
                                        class="block text-gray-600 p-2 text-[0.8rem] font-semibold font-roboto transition-colors duration-200 hover:bg-gray-100">IKU
                                        DJMB 2020-2024</a>

                                    <a href="#"
                                        class="block text-gray-600 p-2 text-[0.8rem] font-semibold font-roboto transition-colors duration-200 hover:bg-gray-100">Blue
                                        Print PPM</a>

                                    <a href="#"
                                        class="block text-gray-600 p-2 text-[0.8rem] font-semibold font-roboto transition-colors duration-200 hover:bg-gray-100">Data
                                        Standarisasi</a>

                                    <a href="#"
                                        class="block text-gray-600 p-2 text-[0.8rem] font-semibold font-roboto transition-colors duration-200 hover:bg-gray-100">PPID</a>

                                    <a href="#"
                                        class="block text-gray-600 p-2 text-[0.8rem] font-semibold font-roboto transition-colors duration-200 hover:bg-gray-100">CAPAIAN
                                        KINERJA</a>

                                    <a href="#"
                                        class="block text-gray-600 p-2 text-[0.8rem] font-semibold font-roboto transition-colors duration-200 hover:bg-gray-100">RENSTRA</a>
                                </div>
                                <div class="flex flex-col w-full gap-2">
                                    <a href="#"
                                        class="block text-gray-600 p-2 text-[0.8rem] font-semibold font-roboto transition-colors duration-200 hover:bg-gray-100">GALERI</a>

                                    <a href={{ route('public-information.faq') }}
                                        class="block text-gray-600 p-2 text-[0.8rem] font-semibold font-roboto transition-colors duration-200 hover:bg-gray-100">FAQ</a>

                                    <a href="#"
                                        class="block text-gray-600 p-2 text-[0.8rem] font-semibold font-roboto transition-colors duration-200 hover:bg-gray-100">PERJANJIAN
                                        KINERJA</a>

                                    <a href="#"
                                        class="block text-gray-600 p-2 text-[0.8rem] font-semibold font-roboto transition-colors duration-200 hover:bg-gray-100">LAKIN</a>

                                    <a href="#"
                                        class="block text-gray-600 p-2 text-[0.8rem] font-semibold font-roboto transition-colors duration-200 hover:bg-gray-100">RENCANA
                                        INDUK TIK</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="relative group">
                        <a href="#"
                            class="text-gray-800 px-3 py-2 text-[0.9rem] font-bold font-roboto transition-colors duration-200">
                            Perizinan
                        </a>
                        <div
                            class="absolute left-0 top-full p-4 mt-0 w-[22rem] bg-white rounded-md opacity-0 group-hover:opacity-100 group-hover:translate-y-0 transform translate-y-1 transition-all duration-200 pointer-events-none group-hover:pointer-events-auto z-50 shadow-lg">
                            <div class="flex flex-row items-center justify-center gap-2">
                                <div class="flex flex-col w-full gap-2">
                                    <a href={{ route('permit.service-standard') }}
                                        class="block text-gray-600 p-2 text-[0.8rem] font-semibold font-roboto transition-colors duration-200 hover:bg-gray-100">Standar
                                        Pelayanan</a>

                                    <a href="#"
                                        class="block text-gray-600 p-2 text-[0.8rem] font-semibold font-roboto transition-colors duration-200 hover:bg-gray-100">Alur
                                        Pelayanan RPIM</a>

                                    <a href="#"
                                        class="block text-gray-600 p-2 text-[0.8rem] font-semibold font-roboto transition-colors duration-200 hover:bg-gray-100">Pengambilan
                                        Produk</a>

                                    <a href="#"
                                        class="block text-gray-600 p-2 text-[0.8rem] font-semibold font-roboto transition-colors duration-200 hover:bg-gray-100">Status
                                        IUP Nasional</a>

                                    <a href="#"
                                        class="block text-gray-600 p-2 text-[0.8rem] font-semibold font-roboto transition-colors duration-200 hover:bg-gray-100">Pengumuman
                                        CNC</a>
                                </div>

                                <div class="flex flex-col w-full gap-2">
                                    <a href="#"
                                        class="block text-gray-600 p-2 text-[0.8rem] font-semibold font-roboto transition-colors duration-200 hover:bg-gray-100">Persyaratan</a>

                                    <a href="#"
                                        class="block text-gray-600 p-2 text-[0.8rem] font-semibold font-roboto transition-colors duration-200 hover:bg-gray-100">Format
                                        Surat</a>

                                    <a href="#"
                                        class="block text-gray-600 p-2 text-[0.8rem] font-semibold font-roboto transition-colors duration-200 hover:bg-gray-100">KBLI
                                        dan Jenis izin</a>

                                    <a href="{{ route('permit.satisfaction-index') }}"
                                        class="block text-gray-600 p-2 text-[0.8rem] font-semibold font-roboto transition-colors duration-200 hover:bg-gray-100">Indeks
                                        Kepuasan Layanan</a>

                                    <a href="#"
                                        class="block text-gray-600 p-2 text-[0.8rem] font-semibold font-roboto transition-colors duration-200 hover:bg-gray-100">Panduan
                                        Perizinan Minerba</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <a href="https://momi.minerba.esdm.go.id/gisportal/home/"
                        class="text-gray-800 px-3 py-2 text-[0.9rem] font-bold font-roboto transition-colors duration-200">
                        MinerbaOne
                    </a>

                    <div class="relative group">
                        <a href="#"
                            class="text-gray-800 px-3 py-2 text-[0.9rem] font-bold font-roboto transition-colors duration-200">
                            Aplikasi
                        </a>
                        <!-- Dropdown -->
                        <div
                            class="absolute left-0 top-full p-4 mt-0 w-[22rem] bg-white rounded-md opacity-0 group-hover:opacity-100 group-hover:translate-y-0 transform translate-y-1 transition-all duration-200 pointer-events-none group-hover:pointer-events-auto z-50">
                            <div class="flex flex-row items-center justify-center gap-2">
                                <div class="flex flex-col w-full gap-2">
                                    <a href="https://epnbpminerba.esdm.go.id/landing/"
                                        class="block text-gray-600 p-2 text-[0.8rem] font-semibold font-roboto transition-colors duration-200 hover:bg-gray-100">EPNBP</a>
                                    <a href="https://erkab.esdm.go.id/"
                                        class="block text-gray-600 p-2 text-[0.8rem] font-semibold font-roboto transition-colors duration-200 hover:bg-gray-100">E-RKAB
                                        Minerba</a>
                                    <a href="https://momi.minerba.esdm.go.id/gisportal/home/"
                                        class="block text-gray-600 p-2 text-[0.8rem] font-semibold font-roboto transition-colors duration-200 hover:bg-gray-100">Minerba
                                        One Map</a>
                                    <a href="https://mvp.esdm.go.id/login"
                                        class="block text-gray-600 p-2 text-[0.8rem] font-semibold font-roboto transition-colors duration-200 hover:bg-gray-100">MVP</a>
                                    <a href="https://esdm.go.id/inline/Home"
                                        class="block text-gray-600 p-2 text-[0.8rem] font-semibold font-roboto transition-colors duration-200 hover:bg-gray-100">Perizinan
                                        Online</a>
                                    <a href="https://momi.minerba.esdm.go.id/"
                                        class="block text-gray-600 p-2 text-[0.8rem] font-semibold font-roboto transition-colors duration-200 hover:bg-gray-100">Simpel
                                        Lelang</a>
                                </div>
                                <div class="flex flex-col w-full gap-2">
                                    <a href="https://moms.esdm.go.id/login"
                                        class="block text-gray-600 p-2 text-[0.8rem] font-semibold font-roboto transition-colors duration-200 hover:bg-gray-100">MOMS
                                        Batubara</a>
                                    <a href="https://momsmineral.esdm.go.id/"
                                        class="block text-gray-600 p-2 text-[0.8rem] font-semibold font-roboto transition-colors duration-200 hover:bg-gray-100">MOMS
                                        Mineral</a>
                                    <a href="https://modi.esdm.go.id/"
                                        class="block text-gray-600 p-2 text-[0.8rem] font-semibold font-roboto transition-colors duration-200 hover:bg-gray-100">MODI</a>
                                    <a href="https://edw-minerba.esdm.go.id/Account/Login?ReturnUrl=/"
                                        class="block text-gray-600 p-2 text-[0.8rem] font-semibold font-roboto transition-colors duration-200 hover:bg-gray-100">MDS</a>
                                    <a href="https://georima.esdm.go.id/"
                                        class="block text-gray-600 p-2 text-[0.8rem] font-semibold font-roboto transition-colors duration-200 hover:bg-gray-100">GeoRIMA
                                        "Potensi & Cadangan Minerba"</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="relative group">
                        <a href="#"
                            class="text-gray-800 px-3 py-2 text-[0.9rem] font-bold font-roboto transition-colors duration-200">
                            Reformasi Birokrasi
                        </a>
                        <div
                            class="absolute left-0 top-full p-4 mt-0 w-[22rem] bg-white rounded-md opacity-0 group-hover:opacity-100 group-hover:translate-y-0 transform translate-y-1 transition-all duration-200 pointer-events-none group-hover:pointer-events-auto z-50 shadow-lg">
                            <div class="flex flex-row items-center justify-center gap-2">
                                <div class="flex flex-col w-full gap-2">
                                    <a href="{{ route('reformation.integrity-zone') }}"
                                        class="block text-gray-600 p-2 text-[0.8rem] font-semibold font-roboto transition-colors duration-200 hover:bg-gray-100">Zona
                                        Integritas</a>

                                    <a href="#"
                                        class="block text-gray-600 p-2 text-[0.8rem] font-semibold font-roboto transition-colors duration-200 hover:bg-gray-100">SK
                                        Tim Reformasi Birokrasi</a>

                                    <a href="#"
                                        class="block text-gray-600 p-2 text-[0.8rem] font-semibold font-roboto transition-colors duration-200 hover:bg-gray-100">Kode
                                        Etik</a>

                                    <a href="#"
                                        class="block text-gray-600 p-2 text-[0.8rem] font-semibold font-roboto transition-colors duration-200 hover:bg-gray-100">Roadmap
                                        RB</a>
                                </div>

                                <div class="flex flex-col w-full gap-2">
                                    <a href="#"
                                        class="block text-gray-600 p-2 text-[0.8rem] font-semibold font-roboto transition-colors duration-200 hover:bg-gray-100">Peta
                                        Proses Bisnis</a>

                                    <a href="#"
                                        class="block text-gray-600 p-2 text-[0.8rem] font-semibold font-roboto transition-colors duration-200 hover:bg-gray-100">Laporan
                                        Pelaksanaan RB</a>

                                    <a href="#"
                                        class="block text-gray-600 p-2 text-[0.8rem] font-semibold font-roboto transition-colors duration-200 hover:bg-gray-100">Maklumat
                                        Pelayanan</a>

                                    <a href="#"
                                        class="block text-gray-600 p-2 text-[0.8rem] font-semibold font-roboto transition-colors duration-200 hover:bg-gray-100">AGEN
                                        PERUBAHAN</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- <a href="{{ route('price') }}"
                        class="text-gray-800 px-3 py-2 text-[0.9rem] font-bold font-roboto transition-colors duration-200">
                        Harga Acuan
                    </a> --}}
                </div>
            </nav>


            <div class="relative">
                <select
                    class="border border-gray-500 text-gray-700 py-2 px-3 pr-8 rounded-lg leading-tight focus:outline-none focus:border-blue-500 text-sm">
                    <option value="id">ID</option>
                    <option value="en">EN</option>
                </select>
            </div>


            <button
                class="bg-primary-700 text-gray-800 h-20 w-20 transition-colors duration-200 flex items-center justify-center">
                <svg class="size-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
            </button>
        </div>
    </div>


</header>

@push('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const mobileMenuBtn = document.getElementById('mobile-menu-btn');
            const mobileMenu = document.getElementById('mobile-menu');

            mobileMenuBtn.addEventListener('click', function() {
                mobileMenu.classList.toggle('hidden');
            });
        });
    </script>
@endpush
