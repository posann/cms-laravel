<x-public.main>
    @props(['prices', 'defaultStart', 'defaultEnd'])

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
        <div class="flex flex-col">
            <span class="font-semibold text-base text-gray-700">Periode:</span>
            <div id="date-range-picker" class="flex items-center gap-2">

                <form method="GET" action="{{ route('price') }}" class="flex items-center gap-2">

                    <!-- START DATE -->
                    <input type="date" name="start" value="{{ request('start', $defaultStart) }}"
                        class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg 
               focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">

                    <span class="mx-2 text-gray-600 text-sm">Sampai</span>

                    <!-- END DATE -->
                    <input type="date" name="end" value="{{ request('end', $defaultEnd) }}"
                        class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg 
               focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">

                    <!-- SUBMIT -->
                    <button type="submit"
                        class="focus:outline-none text-black bg-yellow-400 font-semibold hover:bg-yellow-500 
               focus:ring-4 focus:ring-yellow-200 rounded-lg text-sm px-5 py-2.5">
                        Submit
                    </button>
                </form>
            </div>
        </div>

        <hr class="border-gray-300 my-4">
    </div>

    <div class="w-full grid grid-cols-2 gap-6 max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
        @foreach ($prices as $menu)
            @php
                // Kumpulkan semua harga dari semua sub_menu
                $allPrices = collect($menu['sub_menus'] ?? [])
                    ->flatMap(fn($sub) => collect($sub['prices'])->pluck('price'))
                    ->map(fn($p) => (float) $p) // pastikan jadi angka
                    ->toArray();

                $maxPrice = !empty($allPrices) ? max($allPrices) : 1000;
                $roundedMax = ceil($maxPrice / 500) * 500 * 2;
            @endphp

            <div class="mb-8 border border-primary-700 p-4 rounded-lg">
                <h2 class="text-xl text-center font-bold py-4 text-black">
                    Grafik Harga Mineral Acuan ({{ $menu['menu_name'] }})
                </h2>

                <canvas id="chart-{{ $menu['menu_id'] }}" height="200"></canvas>

                <script>
                    document.addEventListener("DOMContentLoaded", function() {
                        const dataPrice = @json($menu);
                        const ctx = document.getElementById(`chart-${dataPrice.menu_id}`).getContext("2d");

                        const labels = [];
                        dataPrice.sub_menus?.forEach(sub => {
                            sub.prices.forEach(p => {
                                const date = new Date(p.date_period).toLocaleDateString('id-ID', {
                                    month: 'long',
                                    year: 'numeric'
                                });
                                if (!labels.includes(date)) labels.push(date);
                            });
                        });

                        function yellowShade(opacity = 1) {
                            const hue = 10 + Math.floor(Math.random() * 90); // variasi hue 45–65 (kuning → orange muda)
                            const sat = 80 + Math.floor(Math.random() * 20); // 70–90% saturasi
                            const light = 40; // 40–60% lightness
                            return `hsl(${hue}, ${sat}%, ${light}%, ${opacity})`;
                        }

                        // Dataset per sub_menu
                        const dataSets = dataPrice.sub_menus?.map(subMenu => {
                            const border = yellowShade(4);
                            const bg = yellowShade(1);
                            return {
                                label: subMenu.sub_name,
                                data: labels.map(date => {
                                    const priceData = subMenu.prices.find(p =>
                                        new Date(p.date_period).toLocaleDateString('id-ID', {
                                            month: 'long',
                                            year: 'numeric'
                                        }) === date
                                    );
                                    return priceData ? parseFloat(priceData.price) : null;
                                }),
                                borderColor: border,
                                backgroundColor: bg,
                                pointRadius: 4,
                                cubicInterpolationMode: 'monotone',
                                tension: 0.4,
                                pointBackgroundColor: "#000"
                            };
                        });

                        new Chart(ctx, {
                            type: "line",
                            data: {
                                labels,
                                datasets: dataSets
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
                                                return context.dataset.label + ": " +
                                                    context.raw.toLocaleString() + " USD/dmt";
                                            }
                                        }
                                    }
                                },
                                scales: {
                                    y: {
                                        ticks: {
                                            color: "#000",
                                            callback: function(value) {
                                                return value.toLocaleString() + " USD";
                                            }
                                        },
                                        grid: {
                                            color: "rgba(43,43,43,0.1)"
                                        },
                                        title: {
                                            display: true,
                                            text: "USD/dmt",
                                            color: "#000"
                                        }
                                    },
                                    x: {
                                        ticks: {
                                            color: "#000",
                                            maxRotation: 0,
                                            minRotation: 0
                                        },
                                        grid: {
                                            color: "rgba(43,43,43,0.1)"
                                        },
                                        title: {
                                            display: false,
                                            text: "Date Periode",
                                            color: "#000",
                                            font: {
                                                size: 14,
                                                weight: 'bold'
                                            }
                                        },
                                        padding: {
                                            left: 10,
                                            right: 10,
                                            top: 10,
                                            bottom: 0
                                        }
                                    }
                                }
                            }
                        });
                    });
                </script>

            </div>
        @endforeach
    </div>

    <div class="w-full mb-8 mx-auto max-w-6xl px-4 sm:px-6 lg:px-8 pb-4">
        <h2 class="text-xl font-bold text-gray-800 my-2">Tabel Harga Mineral Acuan</h2>
        <div class="relative overflow-x-auto p-2 bg-white border-2 border-yellow-400 rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right p-2 text-gray-500 rounded-lg">
                <thead class="text-xs text-gray-50 uppercase bg-gray-900 ">
                    <tr>
                        <th scope="col" class="px-6 py-3 !text-xs">
                            Komoditas
                        </th>
                        <th scope="col" class="px-6 py-3 !text-xs">
                            Oktober 2024
                        </th>
                        <th scope="col" class="px-6 py-3 !text-xs">
                            November 2024
                        </th>
                        <th scope="col" class="px-6 py-3 !text-xs">
                            Desember 2024
                        </th>
                        <th scope="col" class="px-6 py-3 !text-xs">
                            Januari 2025
                        </th>
                        <th scope="col" class="px-6 py-3 !text-xs">
                            Februari 2025
                        </th>
                        <th scope="col" class="px-6 py-3 !text-xs bg-yellow-50">

                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="bg-white border-b  border-gray-200">
                        <th scope="row" class="px-6 py-4 !text-xs font-semibold text-gray-900 whitespace-nowrap">
                            Belerang
                        </th>
                        <td class="px-6 py-4 !text-xs">
                            131.1
                        </td>
                        <td class="px-6 py-4 !text-xs">
                            112.1
                        </td>
                        <td class="px-6 py-4 !text-xs">
                            321.1
                        </td>
                        <td class="px-6 py-4 !text-xs">
                            452.3
                        </td>
                        <td class="px-6 py-4 !text-xs">
                            541.3
                        </td>
                        <td class="px-6 py-4 !text-xs bg-yellow-50 font-bold">
                            212.1
                        </td>
                    </tr>
                    <tr class="bg-white border-b  border-gray-200">
                        <th scope="row" class="px-6 py-4 !text-xs font-semibold text-gray-900 whitespace-nowrap">
                            Emas
                        </th>
                        <td class="px-6 py-4 !text-xs">
                            131.1
                        </td>
                        <td class="px-6 py-4 !text-xs">
                            112.1
                        </td>
                        <td class="px-6 py-4 !text-xs">
                            321.1
                        </td>
                        <td class="px-6 py-4 !text-xs">
                            452.3
                        </td>
                        <td class="px-6 py-4 !text-xs">
                            541.3
                        </td>
                        <td class="px-6 py-4 !text-xs bg-yellow-50 font-bold">
                            212.1
                        </td>
                    </tr>
                    <tr class="bg-white border-b  border-gray-200">
                        <th scope="row" class="px-6 py-4 !text-xs font-semibold text-gray-900 whitespace-nowrap">
                            Emas (B3)
                        </th>
                        <td class="px-6 py-4 !text-xs">
                            131.1
                        </td>
                        <td class="px-6 py-4 !text-xs">
                            112.1
                        </td>
                        <td class="px-6 py-4 !text-xs">
                            321.1
                        </td>
                        <td class="px-6 py-4 !text-xs">
                            452.3
                        </td>
                        <td class="px-6 py-4 !text-xs">
                            541.3
                        </td>
                        <td class="px-6 py-4 !text-xs bg-yellow-50 font-bold">
                            212.1
                        </td>
                    </tr>
                    <tr class="bg-white border-b  border-gray-200">
                        <th scope="row" class="px-6 py-4 !text-xs font-semibold text-gray-900 whitespace-nowrap">
                            Emas (H1)
                        </th>
                        <td class="px-6 py-4 !text-xs">
                            131.1
                        </td>
                        <td class="px-6 py-4 !text-xs">
                            112.1
                        </td>
                        <td class="px-6 py-4 !text-xs">
                            321.1
                        </td>
                        <td class="px-6 py-4 !text-xs">
                            452.3
                        </td>
                        <td class="px-6 py-4 !text-xs">
                            541.3
                        </td>
                        <td class="px-6 py-4 !text-xs bg-yellow-50 font-bold">
                            212.1
                        </td>
                    </tr>
                </tbody>
            </table>
            <p class="w-full py-4 text-center mx-auto text-xs text-gray-700">Sumber: Tabel Harga Mineral dan Batubara
                Acuan
                (2025)</p>
        </div>


    </div>
</x-public.main>
