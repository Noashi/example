<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Age;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    public function index() {
        // セレクトボタン表示用変数ages
        $ages = Age::get();
        // アンケートデータ変数answers
        $answers = Answer::paginate(10);

        return view('system.index', compact('ages', 'answers'));
    }

    public function show($id) {
        // 「年代」表示用変数ages
        $ages = Age::get();

        $answer = answer::findOrFail($id);
        
        return view('system.answer', compact('ages', 'answer'));
    }
}
