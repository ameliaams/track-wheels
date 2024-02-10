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

    public function updateStatus(Request $request)
    {
        $booking = Booking::findOrFail($request->id);

        // Validasi status yang diterima
        $validatedData = $request->validate([
            'status' => ['required', Rule::in(['Diterima', 'Ditolak', 'Pending'])],
        ]);

        // Simpan status yang diterima
        $booking->status = $validatedData['status'];
        $booking->save();

        return response()->json(['success' => true]);
    }
}
