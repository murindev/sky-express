<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\UI\Offices;
use Illuminate\Http\Request;

class OfficeController extends Controller
{
    public function index() {
        return view('root.offices')->with([
            'offices' => Offices::where('active', 1)->orderBy('order')->get()
        ]);
    }
}
