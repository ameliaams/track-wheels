<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookreqController extends Controller
{
    public function index()
    {
        return view('user.request');
    }
}
