<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use App\Models\Lokasi;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index(Request $request)
    {
        $barang = Barang::with(['kategori', 'lokasi'])
            ->when($request->search, function ($q) use ($request) {
                $q->where('nama_barang', 'like', '%' . $request->search . '%');
            })
            ->when($request->kategori, function ($q) use ($request) {
                $q->where('kategori_id', $request->kategori);
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        $kategori = Kategori::all();

        return view('barang.index', compact('barang', 'kategori'));
    }

   public function create()
{
    $kategori = Kategori::all();
    $lokasi = Lokasi::all();

    // Logika Kode Otomatis: BRG-YYYY-001
    $today = now()->format('Y');
    $lastBarang = Barang::latest()->first();
    $nextNumber = $lastBarang ? (int)substr($lastBarang->kode_barang, -3) + 1 : 1;
    $kodeOtomatis = 'BRG-' . $today . '-' . str_pad($nextNumber, 3, '0', STR_PAD_LEFT);

    return view('barang.create', compact('kategori', 'lokasi', 'kodeOtomatis'));
}

   public function store(Request $request)
{
    $request->validate([
        'nama_barang' => 'required',
        'kategori_id' => 'required',
        'lokasi_id' => 'required',
        'jumlah' => 'required|numeric',
        'satuan' => 'required',
        'kondisi' => 'required',
    ]);

    // LOGIKA GENERATE KODE OTOMATIS
    $latest = \App\Models\Barang::latest()->first();
    $number = $latest ? $latest->id + 1 : 1;
    $kode_barang = 'BRG-' . str_pad($number, 5, '0', STR_PAD_LEFT); // Hasil: BRG-00001

    \App\Models\Barang::create([
        'kode_barang' => $kode_barang, // Memasukkan kode otomatis
        'nama_barang' => $request->nama_barang,
        'kategori_id' => $request->kategori_id,
        'lokasi_id' => $request->lokasi_id,
        'jumlah' => $request->jumlah,
        'satuan' => $request->satuan,
        'kondisi' => $request->kondisi,
        // 'gambar' => $path, // Jika ada upload gambar
    ]);

    return redirect()->route('barang.index')->with('success', 'Barang berhasil disimpan!');
}
    public function show(Barang $barang)
    {
        return view('barang.show', compact('barang'));
    }

    public function edit(Barang $barang)
    {
        return view('barang.edit', [
            'barang'   => $barang,
            'kategori' => Kategori::all(),
            'lokasi'   => Lokasi::all(),
        ]);
    }

    public function update(Request $request, Barang $barang)
    {
        $validated = $request->validate([
            'nama_barang' => 'required|string',
            'kategori_id' => 'required|exists:kategori,id',
            'lokasi_id'   => 'required|exists:lokasi,id',
            'kondisi'     => 'required|in:baik,rusak',
            'jumlah'      => 'required|integer|min:0',
            'satuan'      => 'required|string',
        ]);

        $barang->update($validated);

        return redirect()
            ->route('barang.index')
            ->with('success', 'Barang berhasil diperbarui');
    }

    public function destroy(Barang $barang)
    {
        $barang->delete();

        return redirect()
            ->route('barang.index')
            ->with('success', 'Barang berhasil dihapus');
    }
}