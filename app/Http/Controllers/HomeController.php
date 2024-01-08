<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $hotels = Hotel::with(['images', 'facilities'])->get();

        return view('pages.home', ['hotels' => $hotels]);
    }
}
