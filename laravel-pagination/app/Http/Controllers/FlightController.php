<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use Illuminate\Http\Request;

class FlightController extends Controller
{
    public function getData()
    {
        $voli = Flight::paginate(10);

        return view('voli', compact('voli'));
    }
}
