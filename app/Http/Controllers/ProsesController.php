<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use App\Models\Mitra;
use App\Models\Perhitungan;
use Illuminate\Http\Request;

class ProsesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $perhitungan = Perhitungan::all();
        $mitra = Mitra::all();
        $kriteria = Kriteria::all();
        $krt_bobot = [];
        foreach($kriteria as $key => $value) {
            $krt_bobot[$key] = $value->bobot;
        }

        $total_bobot = array_sum($krt_bobot);
        $normalisasi = [];
        foreach($kriteria as $key => $value) {
            $normalisasi[$key]['id'] = $mitra[$key]->id;
            $normalisasi[$key]['bobot'] = $value->bobot / $total_bobot;
        }

        // S1



        return view('proses.index', compact('perhitungan', 'normalisasi',));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(Perhitungan $perhitungan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Perhitungan $perhitungan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Perhitungan $perhitungan)
    {
        //
    }
}
