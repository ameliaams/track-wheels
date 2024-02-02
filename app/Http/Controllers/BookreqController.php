<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BookreqController extends Controller
{
    public function index()
    {
        return view('user.request');
    }

    public function show()
    {
        $id = Auth::user()->id;
        $akun = Auth::user();

        return view('user.approval', compact( 'user'));
    }

    public function showRequest()
    {
        $id = Auth::user()->id;
        $booking = Booking::where('user_id', $id)->with('user')->first();

        return view('user.approval', ['booking' => $booking]);
    }
}
