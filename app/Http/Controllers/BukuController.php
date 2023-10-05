<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bookData = Buku::all();
        return response()->json([
           "message" => "Berhasil Mendapatkan Buku",
           "data" => $bookData
        ],200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $data = Buku::create([
          "kode_buku" => $request->kode_buku,
          "judul_buku" => $request->judul_buku,
          "penulis_buku" => $request->penulis_buku,
          "penerbit_buku" => $request->penerbit_buku,
          "tahun_penerbit" => $request->tahun_penerbit,
          "stok" => $request->stok
        ]); 

        if(!$data) return response()->json([
             "message" => "Gagal Membuat Buku",
        ],400);
        
        
        return response()->json([
           "message" => "Berhasil Membuat Buku",
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
        $data = Buku::findOrFail($request->id);
        $updatedData = $data->update([
          "kode_buku" => $request->kode_buku,
          "judul_buku" => $request->judul_buku,
          "penulis_buku" => $request->penulis_buku,
          "penerbit_buku" => $request->penerbit_buku,
          "tahun_penerbit" => $request->tahun_penerbit,
          "stok" => $request->stok
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
         $dataToDelete = Buku::findOrFail($id);
         $deleteProceed = $dataToDelete->delete();
         
         if(!$deleteProceed) return response()->json([
           "message" => "Gagal Menghapus Data!"
         ],400);

         return response()->json([
           "message" => "Berhasil Menghapus Data!"
         ],200);
    }

}
