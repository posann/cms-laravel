<x-public.main>
    {{-- @props(['prices', 'defaultStart', 'defaultEnd']) --}}

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <div class="relative w-full h-[30%] bg-neutral-600 py-12 px-4 sm:px-6 md:px-8 lg:px-12 xl:px-16 2xl:px-20">
        <div class="absolute inset-0 h-full bg-no-repeat bg-contain opacity-70"
            style="background-image:url('{{ asset('images/asset/header line asset.png') }}');"></div>
        <div class="max-w-[90rem] relative z-10">
            <div class="flex flex-col gap-2">
                <div
                    class="mb-4 sm:mb-6 gap-2 sm:gap-4 items-center justify-start flex flex-row flex-wrap text-white font-roboto">
                    <strong class="text-xs sm:text-sm">Beranda</strong>
                    <span class="text-xs sm:text-sm">&#9679;</span>
                    <strong class="text-xs sm:text-sm">Harga</strong>
                    <span class="text-xs sm:text-sm">&#9679;</span>
                    <span class="text-xs sm:text-sm">Harga Mineral Acuan</span>
                </div>
                <h1 class="text-3xl md:text-4xl font-roboto font-bold text-primary-800  leading-tight">
                    Harga Mineral Acuan
                </h1>
            </div>
        </div>
    </div>



    <div class="w-full mb-2 mx-auto max-w-6xl px-4 sm:px-6 lg:px-8 py-4 mt-4">
        <div class="text-xl text-center font-bold text-gray-800 mb-2">
            Index Kepuasan Layanan Ditjen Minerba
        </div>
        <div class="flex flex-col mx-auto m-0 max-w-md">
            <form method="GET" class="flex items-center gap-2">
                <select id="years"
                    class="block w-full px-3 py-2.5 bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-md focus:ring-brand focus:border-brand px-3 py-2.5 shadow-xs placeholder:text-body">
                    <option value="2021">2021</option>
                    <option value="2022">2022</option>
                    <option value="2023">2023</option>
                    <option value="2024">2024</option>
                </select>

                <select id="triwulan"
                    class="block w-full px-3 py-2.5 bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-md focus:ring-brand focus:border-brand px-3 py-2.5 shadow-xs placeholder:text-body">
                    <option value="TW1">Triwulan 1</option>
                    <option value="TW2">Triwulan 2</option>
                    <option value="TW3">Triwulan 3</option>
                    <option value="TW4">Triwulan 4</option>
                </select>
            </form>
        </div>

        <hr class="border-gray-300 my-4">
    </div>

    <div class="w-full grid grid-cols-2 gap-6 max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-4">

        <div class="mb-8 border border-primary-700 p-4 rounded-lg">
            <canvas id="chart-index-kepuasan" height="120"></canvas>

            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    const ctx = document.getElementById(`chart-index-kepuasan`).getContext("2d");

                    const labels = ["TW 1", "TW 2", "TW 3", "TW 4"];

                    new Chart(ctx, {
                        type: "line",
                        data: {
                            labels,
                            datasets: [{
                                label: "Kepuasan Layanan",
                                data: [2.5, 3.0, 3.5, 4.0],
                                borderColor: "rgba(54, 162, 235, 1)",
                                backgroundColor: "rgba(54, 162, 235, 0.2)",
                                fill: false,
                            }]
                        },
                        options: {
                            responsive: true,
                            interaction: {
                                mode: 'index',
                                intersect: false
                            },
                            plugins: {
                                legend: {
                                    position: "bottom",
                                    labels: {
                                        color: "#000"
                                    }
                                },
                                tooltip: {
                                    backgroundColor: "#FBFECA",
                                    titleColor: "#000",
                                    bodyColor: "#000",
                                    callbacks: {
                                        label: function(context) {
                                            if (context.raw === null) return context.dataset.label + ": -";
                                            return context.dataset.label + ": " + context.raw;
                                        }
                                    }
                                }
                            },
                            scales: {
                                y: {
                                    min: 2.5,
                                    max: 4.0,
                                    ticks: {
                                        color: "#000",
                                        stepSize: 0.5, // <-- agar tick muncul setiap 0.5
                                        callback: function(value) {
                                            return value.toFixed(1); // tampilkan format 1 angka desimal
                                        }
                                    },
                                    grid: {
                                        color: "rgba(43,43,43,0.1)"
                                    },
                                    title: {
                                        display: false,
                                        text: "Nilai Kepuasan",
                                        color: "#000"
                                    }
                                },
                                x: {
                                    ticks: {
                                        color: "#000"
                                    },
                                    grid: {
                                        color: "rgba(43,43,43,0.1)"
                                    },
                                    title: {
                                        display: false,
                                        text: "Periode Triwulan",
                                        color: "#000"
                                    }
                                }
                            }
                        }
                    });
                });
            </script>


        </div>

        <div class="mb-8 gap-2 flex flex-col">

            <div class="flex flex-row items-start justify-between gap-2">
                <x-public.components.card.card-satisfaction :title="'Pelayanan Perizinan'" :average="'3.50'" :rating="'Baik'"
                    :count="'1211'" />
                <x-public.components.card.card-satisfaction :title="'Pelayanan Informasi'" :average="'3.38'" :rating="'Baik'"
                    :count="'2039'" />
            </div>

            <div class="flex flex-row items-start justify-between gap-2">
                <div class="bg-red-700 rounded-md w-full h-auto text-white px-4 py-2 text-center text-sm">1,00 - 2,59
                </div>
                <div class="bg-orange-500 rounded-md w-full h-auto text-white px-4 py-2 text-center text-sm">2,60 - 3,06
                </div>
                <div class="bg-blue-500 rounded-md w-full h-auto text-white px-4 py-2 text-center text-sm">3,07 - 3,53
                </div>
                <div class="bg-green-700 rounded-md w-full h-auto text-white px-4 py-2 text-center text-sm">3,54 - 4,00
                </div>
            </div>

        </div>
    </div>

</x-public.main>
