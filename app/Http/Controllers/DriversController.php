<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DriversController extends Controller
{
    public function index()
    {
        return view('admin.drivers');
    }
}
