<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Edit Data') }}

            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{route('perhitungan.update', $perhitungan->id)}}" method="POST">
                        @csrf
                        @method("PUT")
                        <input type="text" value="{{ $perhitungan->id }}" class="w-full mb-3 px-3 py-2 bg-slate-100 text-slate-600" name="id" placeholder="ID">
                        <input type="text" value="{{ $perhitungan->id_alt }}" class="w-full mb-3 px-3 py-2 bg-slate-100 text-slate-600" name="id_alt" placeholder="ID Alternatif">
                        <input type="number" value="{{ $perhitungan->pendalaman_survei }}" class="w-full mb-3 px-3 py-2 bg-slate-100 text-slate-600" name="pendalaman_survei" placeholder="pendalaman survei">
                        <input type="number" value="{{ $perhitungan->perilaku }}" class="w-full mb-3 px-3 py-2 bg-slate-100 text-slate-600" name="perilaku" placeholder="perilaku">
                        <input type="number" value="{{ $perhitungan->kualitas_pekerjaan }}" class="w-full mb-3 px-3 py-2 bg-slate-100 text-slate-600" name="kualitas_pekerjaan" placeholder="kualitas_pekerjaan">
                        <input type="number" value="{{ $perhitungan->ketepatan_waktu }}" class="w-full mb-3 px-3 py-2 bg-slate-100 text-slate-600" name="ketepatan_waktu" placeholder="ketepatan_waktu">
                        <button type="submit" class="px-3 py-2 bg-blue-500 text-white">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
