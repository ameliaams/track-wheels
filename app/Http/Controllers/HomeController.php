<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Driver;
use App\Models\Vehicle;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        $users = DB::table('users')->count();
        // return dd($user);
        $driver = Driver::all()->count();
        $passenger = Vehicle::where('jenis_kendaraan', 'Orang')->count();
        $cargo = Vehicle::where('jenis_kendaraan', 'Barang')->count();

        //dd($passenger, $cargo);

        $data = DB::select('SELECT MONTH(booking.tanggal) AS month,
                            kendaraan.jenis_kendaraan AS vehicle_type,
                            COUNT(*) AS total
                            FROM booking
                            JOIN kendaraan ON booking.booking_id = kendaraan.kendaraan_id
                            GROUP BY MONTH(booking.tanggal), kendaraan.jenis_kendaraan
                            ORDER BY MONTH(booking.tanggal);
                            ');

        $labels = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
        $passengerData = [];
        $cargoData = [];

        // Mengisi array data penumpang dan kargo berdasarkan bulan
        foreach ($labels as $index => $label) {
            $passengerData[$index] = 0;
            $cargoData[$index] = 0;

            foreach ($data as $item) {
                if ($item->month == ($index + 1)) {
                    if ($item->vehicle_type == 'orang') {
                        $passengerData[$index] = $item->total;
                    } elseif ($item->vehicle_type == 'barang') {
                        $cargoData[$index] = $item->total;
                    }
                }
            }
        }

        if ($user->role == 'Admin') {
            return view('admin.index', compact('users', 'driver', 'passenger', 'cargo', 'labels', 'passengerData', 'cargoData'));
        } elseif ($user->role == 'User') {
            return view('user.index', compact('users', 'driver', 'passenger', 'cargo', 'labels', 'passengerData', 'cargoData'));
        }
    }
}
