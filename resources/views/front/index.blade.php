@extends('front.layouts.app')

@section('content')
<div class="container col-7 mt-5 mb-5">
    <h4 class="text-center mb-5">システムへのご意見をお聞かせください</h4>
    <form method="post" action={{ route('confirm') }}>
        @csrf
        <div class="form-group row">
            <label class="col-form-label col-sm-3" for="name">氏名<span class="text-danger">※</span></label>
            <div class="col-sm-9">
                <input class="form-control" id="name" type="text" placeholder="入力してください">
            </div>
        </div>
        <div class="row mb-2">
            <span class="col-sm-3">性別<span class="text-danger">※</span></span>
            <div class="col-sm-9">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" name="gender" id="man" type="radio" value="1" checked>
                    <label class="form-check-label" for="man" >男性</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" name="gender" id="woman" type="radio" value="2">
                    <label class="form-check-label" for="woman">女性</label>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-form-label col-sm-3" for="age">年代<span class="text-danger">※</span></label>
            <div class="col-sm-9">
                <select id="age" class="form-control">
                    <option value="">選択してください</option>
                @foreach ($ages as $age)
                    <option value="{{ $age->age }}">{{ $age->age }}</option>
                @endforeach
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-form-label col-sm-3" for="email">メールアドレス<span class="text-danger">※</span></label>
            <div class="col-sm-9">
                <input class="form-control" id="email" type="text" placeholder="入力してください">
            </div>
        </div>
        <div class="checkbox row">
        <span class="col-sm-3">メール送信可否</span>
            <div class="col-sm-9">
                <p class="mb-2">登録したメールアドレスにメールマガジンをお送りしてもよろしいですか？</p>
                <label for="checked">
                    <input id="checked" type="checkbox"　value="1">送信を許可します
                </label>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-3" for="feedback">ご意見</label>
            <div class="col-sm-9">
                <textarea id="feedback" class="form-control" placeholder="入力してください" rows="5"></textarea>
            </div>
        </div>
        <div>
            <button type="submit" class="btn btn-primary mb-2 mx-auto d-block">送信</button>
        </div>
    </form>
</div>
@endsection