<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table = 'barang'; // Nama tabel di database

    protected $fillable = [
        'kode_barang', 'nama_barang', 'kategori_id', 'lokasi_id', 
        'kondisi', 'jumlah', 'satuan', 'harga', 'foto'
    ];

    // Relasi ke tabel Kategoris
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }

    // Relasi ke tabel Lokasis
    public function lokasi()
    {
        return $this->belongsTo(Lokasi::class, 'lokasi_id');
    }
}