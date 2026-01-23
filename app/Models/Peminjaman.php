<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model {
    protected $table = 'peminjaman';
    protected $guarded = ['id'];

    public function detail_peminjaman() { return $this->hasMany(DetailPeminjaman::class); }
}