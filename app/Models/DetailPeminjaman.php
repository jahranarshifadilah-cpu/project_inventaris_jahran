<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class DetailPeminjaman extends Model {
    protected $table = 'detail_peminjaman';
    protected $guarded = ['id'];
    public $timestamps = false; // Karena di foto tidak ada kolom created_at

    public function barang() { return $this->belongsTo(Barang::class); }
}