<?php

namespace App\Http\Controllers\Personal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Docs extends Controller
{
    public function index() {
        return view('personal.docs');
    }
}
