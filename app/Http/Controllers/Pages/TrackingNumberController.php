<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\UI\Offices;
use Illuminate\Http\Request;

class TrackingNumberController extends Controller
{
    public function index() {
        return view('root.truck-number')->with([
//            'offices' => Offices::where('active', 1)->orderBy('order')->get()
        ]);
    }
}
