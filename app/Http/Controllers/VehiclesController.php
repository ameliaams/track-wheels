<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicle;

class VehiclesController extends Controller
{
    public function index()
    {
        $vehicle = Vehicle::all();
        return view('admin.vehicles', compact('vehicle'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'plat_nomor' => 'required',
            'jenis_kendaraan' => 'required',
            'konsumsi_bbm' => 'required',
            'jadwal_servis' => 'required|date', 
            'riwayat_pemakaian' => 'required',
        ]);

        Vehicle::create($validatedData);
        return redirect()->route('admin.vehicle.list')->with('success', 'Vehicle added successfully!');
    }
}
