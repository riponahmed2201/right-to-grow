<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MapTrackingController extends Controller
{
    public function showMapTracking()
    {
        return view('frontend.map_tracking.view_map');
    }
}
