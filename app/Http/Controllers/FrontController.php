<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Http\Requests\ConfirmRequest;
use App\Http\Requests\StoreRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontController extends Controller
{
    public function index() {
        $ages = DB::table('ages')->get();
        return view('front.index', compact('ages'));
    }

    public function confirm(ConfirmRequest $request) {
        
        $validated = $request->validated();
        return view('front.confirm', compact('validated'));
    }

    public function store(StoreRequest $request) {

        // 確認画面で戻るボタンが押された場合
        if ($request->get('action') === 'back') {
            // 入力画面へ戻る
            return redirect()
                ->route('index')
                ->withInput($request->except(['action']));
        }

        $validated = $request->validated();
        Answer::create($validated);

        return redirect('index')->with('message','アンケートを送信しました。');
    }
}
