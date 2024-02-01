<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function index()
    {
        return view('admin.booking');
    }

    public function store(Request $request)
    {
        $booking = new Booking;

        $user = Auth::user()->id;
        $booking->booking_id = $user;
        $booking->nama = $request->get('nama');
        $booking->jenis_kendaraan = $request->get('jenis_kendaraan');
        $booking->tanggal = $request->get('tanggal');
        $booking->sopir = $request->get('sopir');
        $booking->persetujuan = $request->get('persetujuan');
    }
}
