<?php

namespace App\Http\Controllers;

use App\Http\Controllers\MahasiswaController;
use Illuminate\Http\Request;

use App\Models\MahasiswaModel;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //  $mahasiswa = mahasiswaController::all();
        //  return response()->json([
        //      'data'=> $mahasiswa
        //  ]);

         $mahasiswa = MahasiswaModel::all();
         return response()->json($mahasiswa, 200);  
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
        $mahasiswa = MahasiswaModel::create($request->all());
        return response()->json($mahasiswa, 201);

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
          $mahasiswa= MahasiswaModel::where('id', $id)->first();
         if (empty($mahasiswa)){
             return response()->json([
                 'pesan' => 'Data Tidak ditemukan',
                 'data' => null
             ],404);
         }

         return response()->json([
                 'pesan' => 'Data Ditemukan',
                 'data' => $mahasiswa
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
    public function update(Request $request,  $id)
    {
        $mahasiswa = MahasiswaModel::findOrFail($id);
        $mahasiswa->update($request->all());
        return response()->json($mahasiswa);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = MahasiswaModel::where('id', $id)->first();
        if (empty($data)){
            return response()->json([
                'message' => 'Data Tidak ditemukan',
            ],404);
        }
        MahasiswaModel::findOrFail($id)->delete();
        return response()->json([
            'message' => 'Data Telah Dihapus'
        ],204 );
    }
}
