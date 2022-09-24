<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Pages\PageAddServices;
use Illuminate\Http\Request;

class AddServiceController extends Controller
{
    public function index() {
        return view('root.add-services')->with([
            'title' => 'Услуги',
            'data' => PageAddServices::where('active',1)->orderBy('order')->get()
        ]);
    }

    public function show($slug) {
        return view('root.add-service')->with([
            'data' => PageAddServices::where('slug',$slug)->first()
        ]);
    }
}
