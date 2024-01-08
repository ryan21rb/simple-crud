<?php

namespace App\Http\Controllers;

use App\Models\customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = customer::all();
        return view('customer.index', compact('customers'));
    }
    public function create()
    {
        return view('customer.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'id_customer' => 'required',
            'nama' => 'required',
            'email' => 'required|email',
            'alamat' => 'required',
        ]);

        $customer = new Customer([
            'id_customer' => $request->input('id_customer'),
            'nama' => $request->input('nama'),
            'email' => $request->input('email'),
            'alamat' => $request->input('alamat'),
        ]);

        $customer->save();

        return redirect()->route('customer.index')->with('success', 'Customer berhasil ditambahkan.');
    }
    public function edit($id_customer)
    {
        $customer = customer::findOrFail($id_customer);
        return view('customer.editcustomer', compact('customer'));
    }

    public function update(Request $request, $id_customer)
    {
        $request->validate([
            'id_customer' => 'required',
            'nama' => 'required',
            'email' => 'required',
            'alamat' => 'required',
        ]);
    
        $customer = customer::findOrFail($id_customer);
    
        $customer->update([
            'id_customer' => $request->id_customer,
            'nama' => $request->nama,
            'email' => $request->email,
            'alamat' => $request->alamat,
        ]);
    
        return redirect()->route('customer.index')->with('success', 'customer berhasil diperbarui.');
    }
    

    public function delete($id_customer)
{
    $customer = customer::find($id_customer);

    if ($customer) {
        $customer->delete();
        return redirect()->route('customer.index')->with('success', 'customer berhasil dihapus.');
    } else {
        return redirect()->route('customer.index')->with('error', 'customer tidak ditemukan.');
    }
}

public function relasi(){
    $results = DB::table('customer')
            ->join('mobil', 'customer.id_customer', '=', 'mobil.id_mobil')
            ->select('customer.id_customer', 'customer.nama', 'customer.email', 'mobil.id_mobil')
            ->get();
    return view('relasi',compact('results'));
}
}
