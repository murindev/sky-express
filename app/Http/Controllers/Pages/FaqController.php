<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Pages\Faq;
use App\Models\Pages\PageServices;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index() {
        return view('root.faq')->with([
            'title' => 'Полезная информация',
            'data' => Faq::with(['questions'])->where('active',1)->orderBy('order')->get()
        ]);
    }
}
