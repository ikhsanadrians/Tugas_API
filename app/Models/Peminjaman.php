<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;

    protected $fillable = [
        "tanggal_pinjam",
        "tanggal_kembali",
        "buku_id",
        "anggota_id",
        "petugas_id"
    ];
}
