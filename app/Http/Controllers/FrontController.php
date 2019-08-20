<?php

namespace App\Http\Controllers;

use App\Age;
use App\Answer;
use App\Http\Requests\ConfirmRequest;
use App\Http\Requests\StoreRequest;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index() {
        $ages = Age::get();
        return view('front.index', compact('ages'));
    }

    public function confirm(ConfirmRequest $request) {

        $validated = $request->validated();
        $age_sort = $validated['age_sort'];
        $age = Age::where('sort', $age_sort)->first();
        return view('front.confirm', compact('validated', 'age'));
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
