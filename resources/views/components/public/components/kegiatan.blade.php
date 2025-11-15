<div class="bg-white py-8">
    <div class="max-w-7xl mx-auto px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 py-8">
            <div class="space-y-3">
                <h2 class="font-bold text-gray-800 border-b-2 border-yellow-500 text-lg inline-block pb-1">GALERI FOTO
                </h2>
                <div class="rounded-lg overflow-hidden shadow h-96">
                    <div class="relative w-full h-full">
                        <div id="carousel-foto" class="flex w-full h-full transition-transform duration-700 ease-in-out">
                            <img src="https://www.minerba.esdm.go.id/upload/berita/Pembukaan%20Minerba%20Expo%20oleh%20Menteri%20ESDM.jpg"
                                class="w-full h-full object-cover flex-shrink-0" alt="Minerba Expo">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRP-x-xPUcppujsG631Bgevsep9vhk8gFtHxg&s"
                                class="w-full h-full object-cover flex-shrink-0" alt="Foto Kegiatan 2">
                        </div>
                        <div class="absolute bottom-0 left-0 right-0 p-4 text-center bg-black/50 text-white">
                            <a href="#" class="text-white text-lg font-semibold block mb-1">Minerba Expo 2024</a>
                            <a href="#"
                                class="bg-yellow-500 text-sm text-black px-4 py-1 rounded">Selengkapnya</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="space-y-3">
                <h2 class="font-bold text-gray-800 border-b-2 border-yellow-500 text-lg inline-block pb-1">GALERI VIDEO
                </h2>
                <div class="rounded-lg overflow-hidden shadow h-96">
                    <div class="relative w-full h-full">
                        <div id="carousel-video"
                            class="flex w-full h-full transition-transform duration-700 ease-in-out">
                            <iframe class="w-full h-full flex-shrink-0"
                                src="https://www.youtube.com/embed/_xMEDcoicSM?si=p-BKHSAWDcxL_uyh"
                                title="YouTube video 1" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen></iframe>
                            <iframe class="w-full h-full flex-shrink-0"
                                src="https://www.youtube.com/embed/gUrUIcTj6Dg?si=DvC_lMDFUNptQAts"
                                title="YouTube video 1" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 py-8">
            <div class="space-y-3">
                <h2 class="font-bold text-gray-800 border-b-2 border-yellow-500 text-lg inline-block">HARGA ACUAN</h2>
                <div class="h-96 grid grid-cols-2 gap-5">
                    <a href="{{ route('price') }}" class="block w-full h-full">
                        <img src="https://minerba.sahabatngoding.com/images/asset/hma.jpeg" alt="Informasi Harga"
                            class="w-full h-full object-contain">
                    </a>
                    <a href="{{ route('price') }}" class="block w-full h-full">
                        <img src="https://minerba.sahabatngoding.com/images/asset/hba.jpg" alt="Informasi Harga"
                            class="w-full h-full object-contain">
                    </a>
                </div>
            </div>

            <div class="space-y-3">
                <h2 class="font-bold text-gray-800 border-b-2 border-yellow-500 text-lg inline-block">GRAFIK ACUAN</h2>
                <div class="h-96">
                    <a href="{{ route('price') }}" class="block w-full h-full">
                        <img src="https://minerba.sahabatngoding.com/images/asset/harga-acuan-dummy.png"
                            alt="Informasi Harga" class="w-full h-full object-contain">
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // FOTO
    const carouselFoto = document.getElementById("carousel-foto");
    const slidesFoto = carouselFoto.children.length;
    let indexFoto = 0;

    setInterval(() => {
        indexFoto = (indexFoto + 1) % slidesFoto;
        carouselFoto.style.transform = `translateX(-${indexFoto * 100}%)`;
    }, 3000);

    // VIDEO
    const carouselVideo = document.getElementById("carousel-video");
    const slidesVideo = carouselVideo.children.length;
    let indexVideo = 0;

    setInterval(() => {
        indexVideo = (indexVideo + 1) % slidesVideo;
        carouselVideo.style.transform = `translateX(-${indexVideo * 100}%)`;
    }, 6000);
</script>
