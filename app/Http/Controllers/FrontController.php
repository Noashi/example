<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontController extends Controller
{
    public function index() {
        $ages = DB::table('ages')->get();
        return view('index', compact('ages'));
    }
}
