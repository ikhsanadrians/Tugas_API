<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggota;

class AnggotaController extends Controller
{
    public function index()
    {
        $anggotaData = Anggota::all();
        return response()->json([
           "message" => "Berhasil Mendapatkan Anggota",
           "data" => $anggotaData
        ],200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $data = Anggota::create([
          "kode_anggota" => $request->kode_anggota,
          "nama_anggota" => $request->nama_anggota,
          "jk_anggota" => $request->jk_anggota,
          "jurusan_anggota" => $request->jurusan_anggota,
          "no_telp_anggota" => $request->no_telp_anggota,
          "alamat_anggota" => $request->stok
        ]); 

        if(!$data) return response()->json([
             "message" => "Gagal Membuat Anggota",
        ],400);
        
        
        return response()->json([
           "message" => "Berhasil Membuat Anggota",
           "Data" => $data
        ],200);

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
    public function show(string $id)
    {
        //
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
    public function update(Request $request)
    {
        $data = Anggota::findOrFail($request->id);
        $updatedData = $data->update([
          "kode_buku" => $request->kode_buku,
          "judul_buku" => $request->judul_buku,
          "penulis_buku" => $request->penulis_buku,
          "penerbit_buku" => $request->penerbit_buku,
          "tahun_penerbit" => $request->tahun_penerbit,
          "alamat_anggota" => $request->alamat_anggota
        ]);

        if(!$updatedData) return response()->json([
             "message" => "Gagal Mengupdate Data"
        ],400);

        return response()->json([
            "message" => "Berhasil Mengupdate Data",
            "data" => $updatedData
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         $dataToDelete = Anggota::findOrFail($id);
         $dataToProceed = $dataToDelete->delete();
         
         if(!$dataToProceed) return response()->json([
           "message" => "Gagal Menghapus Data!"
         ],400);

         return response()->json([
            "message" => "Berhasil Menghapus Data!"
         ],200);
    }
}
