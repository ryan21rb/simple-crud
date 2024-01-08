<?php

namespace App\Http\Controllers;

use App\Models\customer;
use App\Models\customermobil;
use App\Models\mobil;
use Illuminate\Http\Request;

class customermobilController extends Controller
{
    public function index()
    {
        $customerMobils = CustomerMobil::all();
        return view('customer_mobil.index', compact('customerMobils'));
    }

    public function create()
{
    // Mendapatkan data customers dan mobils dari database
    $customers = Customer::all();
    $mobils = Mobil::all();

    // Mengirimkan data ke view
    return view('customer_mobil.create', compact('customers', 'mobils'));
}



public function store(Request $request)
{
    // Validasi form
    $request->validate([
        'kode' => 'required|numeric',
        'id_customer' => 'required',
        'id_mobil' => 'required',// Sesuaikan dengan kebutuhan validasi lainnya
    ]);

    // Simpan data ke dalam tabel customer_mobil
    CustomerMobil::create([
        'kode' => $request->kode,
        'id_customer' => $request->id_customer,
        'id_mobil' => $request->id_mobil,
        // Sesuaikan dengan field lain yang perlu disimpan
    ]);

    // Redirect ke halaman yang diinginkan setelah penyimpanan berhasil
    return redirect()->route('customer_mobil.index')->with('success', 'Data Customer Mobil berhasil disimpan.');
}

public function update(Request $request, $kode)
{
    $request->validate([
        'kode' => 'required',
        'id_customer' => 'required', // Add validation rules if needed (e.g., 'numeric', 'exists')
        'id_mobil' => 'required', // Add validation rules if needed (e.g., 'numeric', 'exists')
        'nama' => 'required', // Add validation rules if needed (e.g., 'numeric', 'exists')
    ]);

    $customerMobil = CustomerMobil::findOrFail($kode);

    $customerMobil->update([
        'kode' => $request->kode,
        'id_customer' => $request->id_customer,
        'id_mobil' => $request->id_mobil,
        'nama' => $request->nama,
    ]);

    return redirect()->route('customer_mobil.index')->with('success', 'Customer berhasil diperbarui.');
}

public function edit($kode)
{
    $customerMobil = CustomerMobil::find($kode);

    if (!$customerMobil) {
        // Handle the case where the customerMobil is not found, for example, redirect to an error page
        return redirect()->route('error.page');
    }

    // Add logic to fetch related data if needed

    return view('customer_mobil.edit', compact('customerMobil'));
}




public function delete($kode)
{
    $customerMobil = CustomerMobil::where('kode', $kode)->first();

    if ($customerMobil) {
        $customerMobil->delete();
        return redirect()->route('customer_mobil.index')->with('success', 'Customer Mobil berhasil dihapus.');
    } else {
        return redirect()->route('customer_mobil.index')->with('error', 'Customer Mobil tidak ditemukan.');
    }
}
}