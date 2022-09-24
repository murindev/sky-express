<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Pages\PageAction;
use App\Models\Pages\PageIndividual;
use Illuminate\Http\Request;

class ActionController extends Controller
{
    public function index() {
        return view('root.actions')->with([
            'title' => 'Наши акции',
            'data' => PageAction::where('active',1)->orderBy('order')->get()
        ]);
    }

    public function show($slug) {
        return view('root.action')->with([
            'data' => PageAction::where('slug',$slug)->first()
        ]);
    }
}
