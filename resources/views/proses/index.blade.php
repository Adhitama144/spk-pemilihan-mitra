<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Perhitungan WP') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <h2 class="text-xl text-slate-700">Tabel Nilai</h2>
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mb-5">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        ID Alternatif
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Pendalaman_survei
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Perilaku
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Kualitas_pekerjaan
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Ketepatan_Waktu
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($perhitungan as $item)
                                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                        <td class="px-6 py-4">{{ $item->id_alt }}</td>
                                        <td class="px-6 py-4">{{ $item->pendalaman_survei }}</td>
                                        <td class="px-6 py-4">{{ $item->perilaku }}</td>
                                        <td class="px-6 py-4">{{ $item->kualitas_pekerjaan }}</td>
                                        <td class="px-6 py-4">{{ $item->ketepatan_waktu }}</td>
                                    </tr>
                                    @endforeach
                            </tbody>
                        </table>
                    </div>

                    <h2 class="text-xl text-slate-700">Tabel Normalisasi Bobot</h2>
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mb-5">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        ID Alternatif
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Nilai
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($normalisasi as $items)
                                    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                        @foreach ($items as $item)
                                            <td class="px-6 py-4">{{ $item }}</td>
                                        @endforeach
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <h2 class="text-xl text-slate-700">Tabel Vektor S </h2>
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mb-5">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Vektor S
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Nilai
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datas as $key => $item)
                                    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                        <td class="px-6 py-4">S{{ $key+1 }}</td>
                                        <td class="px-6 py-4">{{ $item['bobot'] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <h2 class="text-xl text-slate-700">Perangkingan </h2>
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mb-5">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Rank
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Total
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ranks as $key => $item)
                                    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                        <td class="px-6 py-4">{{ $item['id'] }}</td>
                                        <td class="px-6 py-4">{{ $item['nilai'] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
