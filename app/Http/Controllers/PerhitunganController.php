<?php

namespace App\Http\Controllers;

use App\Models\Perhitungan;
use Illuminate\Http\Request;

class PerhitunganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $perhitungans = Perhitungan::all();

        return view('perhitungan.index', compact('perhitungans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('perhitungan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
     $perhitungan = new Perhitungan();
     $perhitungan->id = $request->id;
     $perhitungan->id_alt = $request->id_alt;
     $perhitungan->pendalaman_survei = $request->pendalaman_survei;
     $perhitungan->perilaku = $request->perilaku;
     $perhitungan->kualitas_pekerjaan = $request->kualitas_pekerjaan;
     $perhitungan->ketepatan_waktu = $request->ketepatan_waktu;
     $perhitungan->save();
     return redirect()->route('perhitungan.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Perhitungan $perhitungan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $perhitungan = Perhitungan::findOrFail($id);
        return view('perhitungan.edit', compact('perhitungan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $perhitungan = Perhitungan::findOrFail($id);
            $perhitungan->id_alt = $request->id_alt;
            $perhitungan->pendalaman_survei = $request->pendalaman_survei;
            $perhitungan->perilaku = $request->perilaku;
            $perhitungan->kualitas_pekerjaan = $request->kualitas_pekerjaan;
            $perhitungan->ketepatan_waktu = $request->ketepatan_waktu;
            $perhitungan->save();
            return redirect()->route('perhitungan.index');
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $perhitungan = Perhitungan::findOrFail($id);
            $perhitungan->delete();
            return redirect()->route('perhitungan.index');
        } catch (\Exception $e) {
            dd($e);
        }
    }
}
