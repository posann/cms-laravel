<header class="bg-white shadow-sm border-b border-gray-200 sticky top-0 z-50">
    <div class="mx-auto pl-4 sm:pl-6 2xl:pl-20 max-h-20">
        <div class="flex items-center justify-between h-20 ">

            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <img class="" src="{{ asset('images/logo-esdm.png') }}" alt="ESDM Logo">
                </div>
            </div>


            <nav class="hidden md:block">
                <div class="ml-10 flex items-baseline space-x-8">
                    <!-- Profil dengan dropdown -->
                    <div class="relative group">
                        <a href="/"
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
                                </div>
                            </div>
                        </div>

                    </div>

                    <a href="{{ route('news') }}"
                        class="text-gray-800 px-3 py-2 text-[0.9rem] font-bold font-roboto transition-colors duration-200">
                        Berita
                    </a>
                    <a href="#"
                        class="text-gray-800 px-3 py-2 text-[0.9rem] font-bold font-roboto transition-colors duration-200">
                        Kinerja
                    </a>
                    <a href="#"
                        class="text-gray-800 px-3 py-2 text-[0.9rem] font-bold font-roboto transition-colors duration-200">
                        Regulasi
                    </a>
                    <a href="#"
                        class="text-gray-800 px-3 py-2 text-[0.9rem] font-bold font-roboto transition-colors duration-200">
                        Publikasi
                    </a>
                    <a href="#"
                        class="text-gray-800 px-3 py-2 text-[0.9rem] font-bold font-roboto transition-colors duration-200">
                        Reformasi Birokrasi
                    </a>
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
