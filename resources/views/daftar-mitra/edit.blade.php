<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Edit Data Mitra') }}

            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{route('daftar-mitra.update', $mitra->id)}}" method="POST">
                        @csrf
                        @method("PUT")
                        <input type="text" value="{{ $mitra->id }}" class="w-full mb-3 px-3 py-2 bg-slate-100 text-slate-600" name="id" placeholder="ID Alternatif">
                        <input type="text" value="{{ $mitra->nama_alternatif }}" class="w-full mb-3 px-3 py-2 bg-slate-100 text-slate-600" name="nama" placeholder="Nama Alternatif">

                        <button type="submit" class="px-3 py-2 bg-blue-500 text-white">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
