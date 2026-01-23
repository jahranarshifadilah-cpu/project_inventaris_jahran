<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up(): void {
    Schema::create('barang', function (Blueprint $table) {
        $table->id();
        $table->string('kode_barang');
        $table->string('nama_barang');
        $table->foreignId('kategori_id')->constrained('kategori');
        $table->foreignId('lokasi_id')->constrained('lokasi');
        $table->enum('kondisi', ['baik', 'rusak_ringan', 'rusak_berat', 'hilang']);
        $table->integer('jumlah');
        $table->string('satuan');
        $table->date('tanggal_beli');
        $table->decimal('harga', 15, 2);
        $table->text('deskripsi');
        $table->string('foto');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barangs');
    }
};
