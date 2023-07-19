<?php

namespace App\Http\Controllers;

use App\Http\Controllers\MatkulController;
use Illuminate\Http\Request;
use App\Models\MatkulModel;
use Illuminate\Support\Facades\Http;

class MatkulController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function ambil()
    {
        $matakuliah = MatkulModel::all();;
        
        return view('task.index',compact('matakuliah'));
    }


    public function index()
    {
        $matakuliah = MatkulModel::all();
        return response()->json($matakuliah, 200);  
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
        $matakuliah = MatkulModel::create($request->all());
        return response()->json($matakuliah, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $matakuliah= MatkulModel::where('id', $id)->first();
        if (empty($matakuliah)){
            return response()->json([
                'pesan' => 'Data Tidak ditemukan',
                'data' => null
            ],404);
        }

        return response()->json([
                'pesan' => 'Data Ditemukan',
                'data' => $matakuliah
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
        $matakuliah = MatkulModel::findOrFail($id);
        $matakuliah->update($request->all());
        return response()->json($matakuliah);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $data = MatkulModel::where('id', $id)->first();
        if (empty($data)){
            return response()->json([
                'message' => 'Data Tidak ditemukan',
            ],404);
        }
        MatkulModel::findOrFail($id)->delete();
        return response()->json([
            'message' => 'Data Telah Dihapus'
        ],204 );
    }
}
