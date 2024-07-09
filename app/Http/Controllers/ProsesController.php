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
        $datas = [];
        $temp = [];
        foreach($perhitungan as $key => $item ) {
            $datas[$key]['id'] = $item->id_alt;
            $datas[$key]['bobot'] = (pow($item->pendalaman_survei, $normalisasi[0]['bobot']) * pow($item->perilaku, $normalisasi[1]['bobot']) * pow($item->kualitas_pekerjaan, $normalisasi[2]['bobot']) * pow($item->ketepatan_waktu, $normalisasi[3]['bobot']) );
            $temp[$key] = (pow($item->pendalaman_survei, $normalisasi[0]['bobot']) * pow($item->perilaku, $normalisasi[1]['bobot']) * pow($item->kualitas_pekerjaan, $normalisasi[2]['bobot']) * pow($item->ketepatan_waktu, $normalisasi[3]['bobot']));
        }

        unset($datas[4]);
        $totals = array_sum($temp);

        // rank
        $ranks = [];
        foreach($datas as $key => $data){
            $ranks[$key]['id'] = $data['id'];
            $ranks[$key]['nilai'] = $data['bobot'] / $totals;
        }

        // dd($ranks);
        ksort($ranks);

        return view('proses.index', compact('perhitungan', 'normalisasi','datas', 'ranks'));
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
