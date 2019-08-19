@extends('front.layouts.app')

@section('header')
    <h4 class="text-center mb-5">システムへのご意見をお聞かせください</h4>
@endsection

@section('form')
<form method="post" action={{ route('confirm') }}>
@endsection

@section('marker')
    <span class="text-danger">※</span>
@endsection

@section('form_name')
    <input class="form-control" name="fullname" type="text" placeholder="入力してください" value="{{ old('fullname') }}">
@endsection

@section('form_gender')
    <div class="form-check form-check-inline">
        <input class="form-check-input" name="gender" id="man" type="radio" value="1" {{ old('gender') == '1' ? 'checked' : '' }}>
        <label class="form-check-label" for="man" >男性</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" name="gender" id="woman" type="radio" value="2" {{ old('gender') == '2' ? 'checked' : '' }}>
        <label class="form-check-label" for="woman">女性</label>
    </div>
@endsection

@section('form_age')
    <select name="age_id" class="form-control">
        <option value="">選択してください</option>
    @foreach ($ages as $age)
        <option name="age_id" value="{{ $age->sort }}" {{ old('age_id') == $age->sort ? 'selected' : ''}}>{{ $age->age }}</option>
    @endforeach
    </select>
@endsection

@section('form_email')
    <input class="form-control" name="email" type="text" placeholder="入力してください" value="{{ old('email') }}">
@endsection

@section('form_isEmailSent')
    <p class="mb-2">登録したメールアドレスにメールマガジンをお送りしてもよろしいですか？</p>
    <label for="checked">
        <input name="checked" type="checkbox"　value="1" {{ old('checked') == 'on' ? 'checked' : ''}}>送信を許可します
    </label>
@endsection

@section('form_feedback')
    <textarea name="feedback" class="form-control" placeholder="入力してください" rows="5">{{ old('feedback') }}"</textarea>
@endsection

@section('button')
<div>
    <button name="action" type="submit" class="btn btn-primary mb-2 mx-auto d-block">確認</button>
</div>
@endsection
