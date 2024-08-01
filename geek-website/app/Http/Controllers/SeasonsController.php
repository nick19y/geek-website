<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Serie;
use Illuminate\Http\Request;

class SeasonsController extends Controller
{
    public function index(Serie $series)
    {
        $seasons=$series->seasons()->with('episodes')->get();
        return view('screens.seasons.index')->with('seasons', $seasons)->with('series', $series);
    }
}
