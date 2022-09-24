<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Pages\PageServices;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index() {
        return view('root.services')->with([
            'title' => 'Услуги',
            'data' => PageServices::where('active',1)->orderBy('order')->get()
        ]);
    }

    public function show($slug) {
        return view('root.service')->with([
            'data' => PageServices::where('slug',$slug)->first()
        ]);
    }
}
