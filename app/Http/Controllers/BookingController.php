<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class BookingController extends Controller
{
    public function index()
    {
        $booking = Booking::all();
        return view('admin.booking', compact('booking'));
    }

    public function store(Request $request)
    {
        $user = Auth::user();

        $booking = new Booking;
        $booking->user_id = $user->id;
        $booking->nama = $request->input('nama');
        $booking->jenis_kendaraan = $request->input('jenis_kendaraan');
        $booking->tanggal = Carbon::parse($request->input('tanggal'))->format('Y-m-d');
        $booking->sopir = $request->input('sopir');
        $booking->persetujuan = $request->input('persetujuan');

        $booking->save();

        return redirect()->route('admin.booklist')->with('success', 'Berhasil mengajukan pemesanan!');
    }


    public function show()
    {
        $id = Auth::user()->id;
        $akun = Auth::user();
        $booking = Booking::where('user_id', $id)->with('user')->first();

        return view('admin.booklist', compact('booking'));
    }
}
