<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontController extends Controller
{
    public function index() {
        $ages = DB::table('ages')->get();
        return view('front.index', compact('ages'));
    }

    public function confirm() {
        return view('front.confirm');
    }
}
