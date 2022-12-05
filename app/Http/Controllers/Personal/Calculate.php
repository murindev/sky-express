<?php

namespace App\Http\Controllers\Personal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Calculate extends Controller
{
    public function index() {
        return view('personal.calculator');
    }
}
