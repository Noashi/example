@extends('front.layouts.app')

@section('header')
    <h4 class="text-center mb-5">内容確認</h4>
@endsection

@section('form')
<form method="post" action="#">
@endsection

@section('form_name')
    <p>  {{ $fullname = $inputs['fullname'] }}</p>
@endsection

@section('form_gender')
    <p>
    @if(($gender = $inputs['gender']) == 1) 
        {{ '男性' }}
    @elseif ($gender == 2)
        {{ '女性' }}
    @endif
    </p>
@endsection

@section('form_age')
    <p>  {{ $age = $inputs['age'] }}</p>
@endsection

@section('form_email')
    <p>  {{ $email = $inputs['email'] }}</p>
@endsection

@section('form_isEmailSent')
    <p>
    @if (isset($inputs['checked'])) 
        <?php $is_sent_email = 1; ?>
        {{ '送信許可' }}
    @else
        <?php $is_sent_email = 0; ?>
        {{ '送信不可' }}
    @endif
    </p>
@endsection

@section('form_feedback')
    <?php $feedback = $inputs['feedback'] ?>
    <!-- 改行を反映 -->
    <p>{!! nl2br(htmlspecialchars($feedback, ENT_QUOTES, 'UTF-8', false), false) !!}</p>   
@endsection

@section('button')
    <div class="btn-toolbar">
        <div class="mx-auto mb-2">
            <a class="btn btn-primary mr-3" href="javascript: history.back()">再入力</a>
            <button type="submit" class="btn btn-success">送信</button>
        </div>
    </div>
@endsection