<?php

namespace App\Http\Controllers;

use App\Http\Controllers\MatakuliahController;
use Illuminate\Http\Request;
use App\Models\Matakuliah;

class MatakuliahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function __construct()
    // {
    //     $this->middleware('auth:api', ['except' => ['login']]);
    // }

    public function index()
    {
        // $matakuliah = Matakuliah::paginate(10);
        $matakuliah = Matakuliah::with('jurusan')->get(); 
        return response()->json([
            'data'=> $matakuliah
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
        $matakuliah = Matakuliah::create($request->all());
        return response()->json($matakuliah, 201);

        // =============================
        // $request->validate([
        //     'name' => 'required',
        //     'smester' => 'required|numeric',
        //     'sks_teori' => 'required|numeric',
        //     'sks_praktikum' => 'required|numeric',
        //     'jurusan_id' => 'required|exists:jurusan,id',
        // ]);

        // $matakuliah = new Matakuliah();
        // $matakuliah->nama = $request->nama;
        // $matakuliah->smester = $request->smester;
        // $matakuliah->sks_teori = $request->sks_teori;
        // $matakuliah->sks_praktikum = $request->sks_praktikum;
        // $matakuliah->jurusan_id = $request->jurusan_id;
        // $matakuliah->save();

        // return response()->json($matakuliah, 201);
        // =================================
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        // return response()->json([
        //     'data' => $product
        // ]);

        // $matakuliah = Matakuliah::where('id', $id)->first();
        // if (empty($matakuliah)){
        //     return response()->json([
        //         'pesan' => 'Data Tidak ditemukan',
        //         'data' => null
        //     ],404);
        // }

        // return response()->json([
        //         'pesan' => 'Data Ditemukan',
        //         'data' => $matakuliah
        //     ],200);


        // =====untuk db relasi=======
        $matakuliah = Matakuliah::with('jurusan')->where('id', $id)->first();
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
        
        $matakuliah = Matakuliah::findOrFail($id);
        $matakuliah->update($request->all());
        return response()->json($matakuliah);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = Matakuliah::where('id', $id)->first();
        if (empty($data)){
            return response()->json([
                'message' => 'Data Tidak ditemukan',
            ],404);
        }
        Matakuliah::findOrFail($id)->delete();
        return response()->json([
            'message' => 'Data Telah Dihapus'
        ],204 );

    }}
