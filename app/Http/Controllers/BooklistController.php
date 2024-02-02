<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Booking;

use Illuminate\Http\Request;

class BooklistController extends Controller
{
    public function index()
    {
        return view('admin.booklist');
    }

    public function show()
    {
        $id = Auth::user()->id;
        $akun = Auth::user();
        // $booking = Booking::join('user', 'user.id', 'booking.user_id')
        //     ->select('booking.*', 'user.username')
        //     ->where('laporan.user_id', $id)
        //     ->first();
        $booking = Booking::where('user_id', $id)->with('user')->first();

        return view('admin.booklist', compact('booking'));
    }
}
