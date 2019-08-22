<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ご意見フォーム</title>
    <!-- ① CSS を追加 -->
    <link rel="stylesheet" href="/css/app.css">
    <!-- ② JavaScript を追加 -->
    <script src="/js/app.js" defer></script>
</head>
<body>
    <div class="container py-5">
        @if (session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif
        
        @yield('header')
        
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        @yield('form')
        @csrf
            <div class="form-group row">
                <label class="col-form-label col-sm-3" for="name">氏名 @yield('marker')</label>
                <div class="col-sm-9">
                    @yield('form_name')
                </div>
            </div>
            <div class="row mb-2">
                <span class="col-sm-3">性別 @yield('marker')</span>
                <div class="col-sm-9">
                    @yield('form_gender')
                </div>
            </div>
            <div class="form-group row">
                <label class="col-form-label col-sm-3" for="age">年代 @yield('marker')</label>
                <div class="col-sm-9">
                    @yield('form_age')
                </div>
            </div>
            <div class="form-group row">
                <label class="col-form-label col-sm-3" for="email">メールアドレス @yield('marker')</label>
                <div class="col-sm-9">
                    @yield('form_email')
                </div>
            </div>
            <div class="checkbox row">
            <span class="col-sm-3">メール送信可否</span>
                <div class="col-sm-9">
                    @yield('form_isEmailSent')
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3" for="feedback">ご意見</label>
                <div class="col-sm-9">
                    @yield('form_feedback')
                </div>
            </div>
            @yield('button')
            @yield('hidden')
        </form>
        <div class="col-sm-12 text-center mt-5">
            <a href="{{ route('home')}}">管理用ページ</a>
        </div>
    </div>
</body>
</html>