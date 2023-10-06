<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;


class PeminjamanController extends Controller
{
    public function index()
    {
        $peminjamanData = Peminjaman::all();
        return response()->json([
           "message" => "Berhasil Mendapatkan Rak",
           "data" => $peminjamanData
        ],200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $data = Peminjaman::create([
          "tanggal_pinjam" => $request->tanggal_pinjam,
          "tanggal_kembali" => $request->tanggal_kembali,
          "buku_id" => $request->buku_id,
          "anggota_id" => $request->anggota_id,
          "petugas_id" => $request->petugas_id      
        ]); 

        if(!$data) return response()->json([
             "message" => "Gagal Membuat Peminjaman",
        ],400);
        
        
        return response()->json([
           "message" => "Berhasil Membuat Peminjaman",
           "data" => $data
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
        $data = Peminjaman::find($id);
        
        if(!$data) return response()->json([
            "message" => "Tidak Menemukan Peminjaman"
        ],400);
        
        return response()->json([
            "message" => "Berhasil Menemukan Peminjaman",
            "data" => $data
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
    public function update(Request $request, string $id)
    {
        $data = Peminjaman::find($id);
        $updatedData = $data->update([
            "tanggal_pinjam" => $request->tanggal_pinjam,
            "tanggal_kembali" => $request->tanggal_kembali,
            "buku_id" => $request->buku_id,
            "anggota_id" => $request->anggota_id,
            "petugas_id" => $request->petugas_id      
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
         $dataToDelete = Peminjaman::findOrFail($id);
         $deleteProceed = $dataToDelete->delete();
         
         if(!$deleteProceed) return response()->json([
           "message" => "Gagal Menghapus Data!"
         ],400);

         return response()->json([
            "message" => "Berhasil Menghapus Data!"
         ],200);
    }

}
