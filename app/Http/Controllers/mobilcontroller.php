<?php

namespace App\Http\Controllers;

use App\Models\mobil;
use Illuminate\Http\Request;

class mobilcontroller extends Controller
{

    public function index()
    {
        $mobil = Mobil::orderBy('id_mobil')->get();
        return view('mobil.index', compact('mobil'));
    }
    
    public function create()
    {
     
        return view('mobil.tambahmobil');
    }

    public function store(Request $request)
    {
        // Validasi data formulir
        $request->validate([
            'merek' => 'required',
            'warna' => 'required',
            'keterangan' => 'required',
        ]);

        // Simpan data baru ke dalam database
        $mobil = new Mobil([
            'merek' => $request->get('merek'),
            'warna' => $request->get('warna'),
            'keterangan' => $request->get('keterangan'),
        ]);

        $mobil->save();

        // Redirect ke halaman lain atau tampilkan pesan sukses
        return redirect()->route('mobil.index')->with('success', 'Data mobil berhasil ditambahkan!');
    }

    
    


    public function edit($id_mobil)
    {
        $mobil = mobil::findOrFail($id_mobil);
        return view('mobil.editmobil', compact('mobil'));
    }

    public function update(Request $request, $id_mobil)
{
    $request->validate([
      
        'merek' => 'required',
        'warna' => 'required',
        'keterangan' => 'required',
    ]);

    $mobil = mobil::findOrFail($id_mobil);

    $mobil->update([
        
        'merek' => $request->merek,
        'warna' => $request->warna,
        'keterangan' => $request->keterangan,
    ]);

    return redirect()->route('mobil.index')->with('success', 'mobil berhasil diperbarui.');
}

public function delete($id_mobil)
{
    $mobil = mobil::find($id_mobil);

    if ($mobil) {
        $mobil->delete();
        return redirect()->route('mobil.index')->with('success', 'mobil berhasil dihapus.');
    } else {
        return redirect()->route('mobil.index')->with('error', 'mobil tidak ditemukan.');
    }
}

}