@extends('front.layouts.app')

@section('header')
    <h4 class="text-center mb-5">内容確認</h4>
@endsection

@section('form')
<form method="post" action="{{ route('store') }}">
@endsection

@section('form_name')
    <p>  {{ $fullname = $validated['fullname'] }}</p>
@endsection

@section('form_gender')
    <p>
    @if(($gender = $validated['gender']) == 1) 
        {{ '男性' }}
    @elseif ($gender == 2)
        {{ '女性' }}
    @endif
    </p>
@endsection

@section('form_age')
    <p>  {{ $age->age }}</p>
    <?php $age_id = $validated['age_sort'] ?>
@endsection

@section('form_email')
    <p>  {{ $email = $validated['email'] }}</p>
@endsection

@section('form_isEmailSent')
    <p>
    @if (isset($validated['checked'])) 
        <?php $is_sent_email = 1; ?>
        {{ '送信許可' }}
    @else
        <?php $is_sent_email = 0; ?>
        {{ '送信不可' }}
    @endif
    </p>
@endsection

@section('form_feedback')
    <?php $feedback = $validated['feedback'] ?>
    <!-- 改行を反映 -->
    <p>{!! nl2br(htmlspecialchars($feedback, ENT_QUOTES, 'UTF-8', false), false) !!}</p>   
@endsection

@section('button')
    <div class="btn-toolbar">
        <div class="mx-auto mb-2">
            <button name="action" type="submit" class="btn btn-primary mr-3" value="back">再入力</button>
            <button name="action" type="submit" class="btn btn-success" value="submit">送信</button>
        </div>
    </div>
@endsection

@section('hidden')
    <input type="hidden" name="fullname" value="{{ $fullname }}">
    <input type="hidden" name="gender" value="{{ $gender }}">
    <input type="hidden" name="age_id" value="{{ $age_id }}">
    <input type="hidden" name="email" value="{{ $email }}">
    <input type="hidden" name="is_send_email" value="{{ $is_sent_email }}">
    <input type="hidden" name="feedback" value="{{ $feedback }}">
@endsection
    