<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NilaiModel;

class NilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $nilai = NilaiModel::with('mahasiswa','matkul','dosen')->get(); 
        return response()->json([
            'data'=> $nilai
        ]);
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
        $nilai = NilaiModel::create($request->all());
        return response()->json($nilai, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {

            $nilai = NilaiModel::with('mahasiswa','matkul','dosen')->where('id', $id)->first();
            if (empty($nilai)){
                return response()->json([
                    'pesan' => 'Data Tidak ditemukan',
                    'data' => null
                ],404);
            }
    
            return response()->json([
                    'pesan' => 'Data Ditemukan',
                    'data' => $nilai
                ],200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $nilai = NilaiModel::findOrFail($id);
        $nilai->update($request->all());
        return response()->json($nilai);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $data = NilaiModel::where('id', $id)->first();
        if (empty($data)){
            return response()->json([
                'message' => 'Data Tidak ditemukan',
            ],404);
        }
        NilaiModel::findOrFail($id)->delete();
        return response()->json([
            'message' => 'Data Telah Dihapus'
        ],204 );
    }
}
