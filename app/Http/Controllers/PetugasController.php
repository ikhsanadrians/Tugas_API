<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Petugas;


class PetugasController extends Controller
{
   
        public function index()
        {
            $petugasData = Petugas::all();
            return response()->json([
               "message" => "Berhasil Mendapatkan Buku",
               "data" => $petugasData
            ],200);
        }
    
        /**
         * Show the form for creating a new resource.
         */
        public function create(Request $request)
        {
            $data = Petugas::create([
              "nama_petugas" => $request->nama_petugas,
              "jabatan_petugas" => $request->jabatan_petugas,
              "no_telp_petugas" => $request->no_telp_petugas,
              "alamat_petugas" => $request->alamat_petugas,
            ]); 
    
            if(!$data) return response()->json([
                 "message" => "Gagal Membuat Anggota",
            ],400);
            
            
            return response()->json([
               "message" => "Berhasil Membuat Anggota",
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
            $data = Petugas::find($id);
            
            if(!$data) return response()->json([
                "message" => "Tidak Menemukan Petugas"
            ],400);
            
            return response()->json([
                "message" => "Berhasil Menemukan Petugas",
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
            $data = Petugas::find($id);
            $updatedData = $data->update([
                "nama_petugas" => $request->nama_petugas,
                "jabatan_petugas" => $request->jabatan_petugas,
                "no_telp_petugas" => $request->no_telp_petugas,
                "alamat_petugas" => $request->alamat_petugas  
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
             $dataToDelete = Petugas::findOrFail($id);
             $deleteProceed = $dataToDelete->delete();
             
             if(!$deleteProceed) return response()->json([
               "message" => "Gagal Menghapus Data!"
             ],400);
    
             return response()->json([
                "message" => "Berhasil Menghapus Data!"
             ],200);
        }
    
    
}
