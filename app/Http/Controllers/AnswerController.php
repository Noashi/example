<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Age;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

        $answer = Answer::findOrFail($id);
        
        return view('system.answer', compact('ages', 'answer'));
    }

    public function search(Request $request) {
        
        $request->flash();
        $data = $request->all();
        $answers = new Answer();
        $ages = Age::get();

        if(isset($data['s_fullname'])) {
            $answers = $answers->where('fullname', 'like', '%'.$request->get('s_fullname').'%');
        }
        if(isset($data['s_age'])) {
            $answers = $answers->where('age_id', $request->get('s_age'));
        }
        if(isset($data['s_gender'])) {
            $answers = $answers->where('gender', $request->get('s_gender'));
        }
        if(isset($data['s_date_from'])) {
            $answers = $answers->whereDate('created_at', '>=', $request->get('s_date_from'));
        }
        if(isset($data['s_date_to'])) {
            $answers = $answers->whereDate('created_at', '<=', $request->get('s_date_to'));
        }
        if(isset($data['s_is_sent_email'])) {
            $answers = $answers->where('is_sent_email', 'like', '%1%');
        }
        if(isset($data['s_keyword'])) {
            $answers = $answers->where(DB::raw('CONCAT(email,feedback)'), 'like', '%'.$request->get('s_keyword').'%');
        }
        
        $answers = $answers->orderBy('created_at','desc')->paginate(10);

        return view('system.index', compact('ages', 'answers'));
    }

    public function destroy($id) {
        $answer = Answer::findOrFail($id);

        $answer->delete();

        return redirect(route('home'))->with('message', 'アンケートを削除しました。');
    }
}
