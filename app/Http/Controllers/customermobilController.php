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
    $id_customer_mobil = customermobil::max('kode') + 1;
    $customers = Customer::all();
    $mobils = Mobil::all();

    return view('customer_mobil.create', compact('customers', 'mobils', 'id_customer_mobil'));
}



public function store(Request $request)
{
    
    $newCustomerMobil = new CustomerMobil($request->all());
    $newCustomerMobil->save();

    return redirect()->route('customer_mobil.index')->with('success', 'Customer Mobil created successfully');
}


public function update(Request $request, $kode)
{
 

    $customerMobil = CustomerMobil::find($kode);
    $customerMobil->id_customer = $request->id_customer;
    $customerMobil->id_mobil = $request->id_mobil;
    $customerMobil->save();

    return redirect()->route('customer_mobil.index')->with('success', 'Customer Mobil updated successfully.');
}



public function edit($kode)
{
    $customerMobil = CustomerMobil::find($kode);
    $customers = Customer::all(); 
    $mobils = Mobil::all(); 

    return view('customer_mobil.edit', compact('customerMobil', 'customers', 'mobils'));
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