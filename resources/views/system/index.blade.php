<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>管理画面</title>
    <!-- ① CSS を追加 -->
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/test.css">
    <!-- ② JavaScript を追加 -->
    <script src="/js/app.js" defer></script>
    
</head>
<body>
    <div class="container col-10 mt-5 mb-5">
        <nav class="navbar navbar-expand-md navbar-light pr-0 pl-0">
            <div class="container p-0">
                    <h4 class="mt-2">アンケート管理システム</h4>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('index') }}">アンケートフォーム</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <div class="border p-5">
            <form  method="post" action="#">
                @csrf
                <div class="row">
                    <div class="form-group row col-sm-4">
                        <label for="search_name" class="col-sm-4">氏名</label>
                        <input type="text" class="form-control col-sm-8" name="search_name" id="search_name" placeholder="入力してください">
                    </div>
                    <div class="form-group row col-sm-4">
                        <label for="search_age" class="col-sm-4">年代</label>
                        <select type="" class="form-control col-sm-8" name="search_age" id="search_age">
                            <option value="0">全て</option>
                        @foreach ($ages as $age)
                            <option name="search_age" value="{{ $age->sort }}" {{ old('age_id') == $age->sort ? 'selected' : ''}}>{{ $age->age }}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="form-group row col-sm-4">
                        <div class="col-sm-4">
                            <span>性別</span>
                        </div>
                        <div class="row col-sm-8">
                            <div class="form-check form-check-inline col-sm-4">
                                <input class="form-check-input" name="search_gender" id="all" type="radio" value="0" {{ old('gender') == '0' ? 'checked' : '' }}>
                                <label class="form-check-label" for="all" >全て</label>
                            </div>
                            <div class="form-check form-check-inline col-sm-4">
                                <input class="form-check-input" name="search_gender" id="man" type="radio" value="1" {{ old('gender') == '1' ? 'checked' : '' }}>
                                <label class="form-check-label" for="man" >男性</label>
                            </div>
                            <div class="form-check form-check-inline col-sm-4">
                                <input class="form-check-input" name="search_gender" id="woman" type="radio" value="2" {{ old('gender') == '2' ? 'checked' : '' }}>
                                <label class="form-check-label" for="woman">女性</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group row col-sm-8">
                        <label>登録日</label>
                    </div>
                    <div class="form-group row col-sm-4">
                    <span class="col-sm-3">メール送信許可</span>
                    <label for="search_checked" class="col-sm-9">
                        <input name="search_checked" id="search_checked" type="checkbox"　value="1" {{ old('checked') == 'on' ? 'checked' : ''}}>許可のみ
                    </label>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group row col-sm-4">
                        <label class="col-sm-4">検索</label>
                        <input type="text" class="form-control col-sm-8" name="search_keyword" id="search_keyword" placeholder="キーワードを入力">
                    </div>
                </div>
                <div class="btn-toolbar">
                    <div class="mx-auto mb-2">
                        <button name="action" type="submit" class="btn btn-primary" value="reset">リセット</button>
                        <button name="action" type="submit" class="btn btn-success" value="submit">検索</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="mt-3 mb-3 col-md-12 container-fluid">
            <div class="row">
                <form class="col-md-4">
                    <button class="btn btn-danger w-50">アンケートを削除</button>
                </form>
                <div class="ml-auto col-md-4 row">
                    <div class="col-md-6 mt-2">全{{ $answers->total() }}件中 {{ ($answers->currentPage() * 10) - 9 }}～{{ ($answers->currentPage() * 10) - 10 + ($answers->count()) }}件表示</div>
                    <div class="col-md-6">{!! $answers->render() !!}</div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
        @if(isset($answers))
        @if($answers->count())
            <table class="table table-condensed table-striped">
                <thead>
                    <tr>
                        <th><input type="checkbox"></th>
                        <th>ID</th>
                        <th>氏名</th>
                        <th>性別</th>
                        <th>年代</th>
                        <th>内容</th>
                        <th class="text-right"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($answers as $answer)
                        <tr>
                            <td><input type="checkbox"></td>
                            <td><span class="badge">{{ $answer->id }}</span></td>
                            <td>{{ $answer->fullname }}</td>
                            <td>@if($answer->gender == 1) 
                                    {{ '男性' }}
                                @elseif ($answer->gender == 2)
                                    {{ '女性' }}
                                @endif</td>
                            <td>@foreach($ages as $age)
                                @if ($age->sort == $answer->age_id)
                                    {{ $age->age }}
                                @endif
                            @endforeach</td>
                            <td> {{ mb_strimwidth($answer->feedback, 0, 31, '…') }}</td>
                            <td class="text-right">
                                <a class="btn btn-xs btn-info" href="{{ route('show', ['id' => $answer->id]) }}"><i class="glyphicon glyphicon-eye-open"></i>詳細</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
        <h3 class="text-center alert alert-info">該当するデータはありません</h3>
        @endif
        @endif
    </div>
</body>
</html>