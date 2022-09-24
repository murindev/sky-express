<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Pages\PageLegal;
use Illuminate\Http\Request;

class LegalController extends Controller
{
    public function index() {
        return view('root.legals')->with([
            'title' => 'Для юридических лиц',
            'data' => PageLegal::where('active',1)->orderBy('order')->get()
        ]);
    }

    public function show($slug) {
        return view('root.legal')->with([
            'data' => PageLegal::where('slug',$slug)->first()
        ]);
    }
}
