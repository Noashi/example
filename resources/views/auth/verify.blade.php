@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('メールアドレスを確認する') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('認証用リンクが送信されました。') }}
                        </div>
                    @endif

                    {{ __('次に進む前に、認証用URLを送るメールアドレスが正しいか確認してください。') }}
                    {{ __('もしメールを受け取らなかったら') }}, <a href="{{ route('verification.resend') }}">{{ __('こちらから再度送り直してください。') }}</a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
