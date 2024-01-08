<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    public function index(int $id, Request $request)
    {
        $hotel = Hotel::with(['images', 'facilities', 'rooms', 'rooms.images'])->find($id);

        return view('pages.hotel', ['hotel' => $hotel]);
    }

    public function searchHotels(Request $request)
    {
        $query = $request->input('query');

        $hotels = Hotel::where('name', 'ilike', '%' . $query . '%')
            ->orWhere('location', 'ilike', '%' . $query . '%')
            ->get();

        return response()->json($hotels);
    }
}
