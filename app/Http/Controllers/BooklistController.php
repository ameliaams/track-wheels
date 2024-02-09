<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Booking;

use Illuminate\Http\Request;

class BooklistController extends Controller
{
    public function index()
    {
        $bookings = Booking::all();
        return view('admin.booklist', compact('bookings'));
    }

    public function show()
    {
        return $this->index();
    }
}
