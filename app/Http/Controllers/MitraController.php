<?php

namespace App\Http\Controllers;

use App\Models\Mitra;
use Illuminate\Http\Request;

class MitraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mitras = Mitra::all();

        return view('daftar-mitra.index', compact('mitras'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('daftar-mitra.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $mitra = new Mitra();
        $mitra->id = $request->id;
        $mitra->nama_alternatif = $request->nama;
        $mitra->save();
        return redirect()->route('daftar-mitra.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Mitra $mitra)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $mitra = Mitra::findOrFail($id);
        return view('daftar-mitra.edit', compact('mitra'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $mitra = Mitra::findOrFail($id);
            $mitra->id = $request->id;
            $mitra->nama_alternatif = $request->nama;
            $mitra->save();
            return redirect()->route('daftar-mitra.index');
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
            $mitra = Mitra::findOrFail($id);
            $mitra->delete();
            return redirect()->route('daftar-mitra.index');
        } catch (\Exception $e) {
            dd($e);
        }
    }
}
