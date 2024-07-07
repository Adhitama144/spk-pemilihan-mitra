<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Penilaian') }}
        </h2>
        <a href="{{ route('perhitungan.create') }}" class="px-3 text-decoration-none py-2 text-white bg-sky-700 mb-5">+ Tambah Data</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        ID
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        ID_ALT
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
                                    <th scope="col" class="px-6 py-3">
                                        Aksi
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($perhitungans as $item)
                                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                        <td class="px-6 py-4">{{ $item->id }}</td>
                                        <td class="px-6 py-4">{{ $item->id_alt }}</td>
                                        <td class="px-6 py-4">{{ $item->pendalaman_survei }}</td>
                                        <td class="px-6 py-4">{{ $item->perilaku }}</td>
                                        <td class="px-6 py-4">{{ $item->kualitas_pekerjaan }}</td>
                                        <td class="px-6 py-4">{{ $item->ketepatan_waktu }}</td>
                                        <td class="px-6 py-4 flex gap-3">
                                            <a href="{{route('perhitungan.edit', $item)}}" class="px-3 py-2 text-white bg-yellow-700">Edit</a>
                                            <form onsubmit="return confirm('Apakah anda yakin?')" action="{{ route('perhitungan.destroy', $item->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-white inline-block px-3 py-2 text-white bg-red-700">
                                                    Hapus
                                                </button>
                                            </form>
                                        </td>
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
