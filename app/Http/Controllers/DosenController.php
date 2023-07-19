<?php

namespace App\Http\Controllers;

use App\Http\Controllers\DosenController;
use Illuminate\Http\Request;


use App\Models\DosenModel;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dosen = DosenModel::all();
        return response()->json($dosen, 200); 
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
        $dosen = DosenModel::create($request->all());
        return response()->json($dosen, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $dosen= DosenModel::where('id', $id)->first();
        if (empty($dosen)){
            return response()->json([
                'pesan' => 'Data Tidak ditemukan',
                'data' => null
            ],404);
        }

        return response()->json([
                'pesan' => 'Data Ditemukan',
                'data' => $dosen
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
        $dosen = DosenModel::findOrFail($id);
        $dosen->update($request->all());
        return response()->json($dosen);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $data = DosenModel::where('id', $id)->first();
        if (empty($data)){
            return response()->json([
                'message' => 'Data Tidak ditemukan',
            ],404);
        }
        DosenModel::findOrFail($id)->delete();
        return response()->json([
            'message' => 'Data Telah Dihapus'
        ],204 );
    }
}
