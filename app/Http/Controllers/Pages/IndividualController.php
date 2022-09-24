<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Pages\PageIndividual;
use Illuminate\Http\Request;

class IndividualController extends Controller
{
    public function index() {
        return view('root.individuals')->with([
            'title' => 'Для физических лиц',
            'data' => PageIndividual::where('active',1)->orderBy('order')->get()
        ]);
    }

    public function show($slug) {
        return view('root.individual')->with([
            'data' => PageIndividual::where('slug',$slug)->first()
        ]);
    }
}
