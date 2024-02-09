<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Driver;

class DriversController extends Controller
{
    public function index()
    {
        $drivers = Driver::all();
        return view('admin.drivers', compact('drivers'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'nomor_sim' => 'required',
            'no_telepon' => 'required',
        ]);

        Driver::create($validatedData);
        return redirect()->route('admin.driver.list')->with('success', 'Driver added successfully!');
    }
}
