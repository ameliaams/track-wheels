<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class BookreqController extends Controller
{
    public function index()
    {
        $bookings = Booking::all();
        return view('user.request', compact('bookings'));
    }

    public function show()
    {
        return $this->index();
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required',
        ]);

        $bookings = Booking::where('booking_id', $id)->first();
        $bookings->status = $request->get('status');
        $bookings->save();

        return redirect()->route('user.request')->with('success', 'Status has been updated');
    }
}
