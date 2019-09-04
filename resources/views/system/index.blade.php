<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>管理画面</title>
    <!-- CSS を追加 -->
    <link rel="stylesheet" href="/css/app.css">
    <!-- JavaScript を追加 -->
    <script src="/js/app.js" defer></script>
    <!-- JQueryを追加 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
    <div class="container col-10 mt-5 mb-5">
        @if (session('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
        @endif
        <nav class="navbar navbar-expand-md navbar-light pr-0 pl-0">
            <div class="container p-0">
                    <a href="{{ route('home') }}" class="mt-2 navbar-brand">アンケート管理システム</a>
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
            <form  method="get" action="{{ route('search') }}" accept-charset="utf-8">
                @csrf
                <div class="row">
                    <div class="form-group row col-sm-4">
                        <label for="s_fullname" class="col-sm-2">氏名</label>
                        <input type="text" class="form-control col-sm-8" name="s_fullname" id="s_fullname" placeholder="入力してください" value="{{ old('s_fullname') }}">
                    </div>
                    <div class="form-group row col-sm-4">
                        <label for="s_age" class="col-sm-2">年代</label>
                        <select type="" class="form-control col-sm-8" name="s_age" id="s_age">
                            <option value="">全て</option>
                        @foreach ($ages as $age)
                            <option name="s_age" value="{{ $age->sort }}" {{ old('s_age') == $age->sort ? 'selected' : ''}}>{{ $age->age }}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="form-group row col-sm-4">
                        <div class="col-sm-4">
                            <span>性別</span>
                        </div>
                        <div class="row col-sm-8">
                                <label class="form-check-label checkbox-inline" for="all"><input class="form-check-input" name="s_gender" id="both" type="radio" value="" checked>全て</label>
                                <label class="form-check-label checkbox-inline" for="man"><input class="form-check-input" name="s_gender" id="man" type="radio" value="1" {{ old('s_gender') == '1' ? 'checked' : '' }}>男性</label>
                                <label class="form-check-label checkbox-inline" for="woman"><input class="form-check-input" name="s_gender" id="woman" type="radio" value="2" {{ old('s_gender') == '2' ? 'checked' : '' }}> 女性</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group row col-sm-8">
                        <div class="form-group col-sm-2">
                            <label>登録日</label>
                        </div>
                        <div class="form-group col-sm-4">
                            <input class="form-control" name="s_date_from" id="s_date_from" type="date" value="{{ old('s_date_from') }}">
                        </div>
                        <div class="auto">
                            <span>　～　</span>
                        </div>
                        <div class="form-group col-sm-4">
                            <input class="form-control" name="s_date_to" id="s_date_to" type="date" value="{{ old('s_date_to') }}">
                        </div>
                    </div>
                    <div class="form-group row col-sm-4">
                        <span class="col-sm-3">メール送信許可</span>
                        <label for="s_is_sent_email" class="col-sm-9">
                            <input name="s_is_sent_email" id="s_is_sent_email" type="checkbox"　value="1" {{ old('s_is_sent_email') == 'on' ? 'checked' : ''}}>許可のみ
                        </label>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group row col-sm-4">
                        <label class="col-sm-4">検索</label>
                        <input type="text" class="form-control col-sm-8" name="s_keyword" id="s_keyword" placeholder="キーワードを入力" value="{{ old('s_keyword') }}">
                    </div>
                </div>
                <div class="btn-toolbar">
                    <div class="mx-auto mb-2">
                        <button name="action" type="reset" class="btn btn-primary mr-3 clearForm" value="clear">リセット</button>
                        <button name="action" type="submit" class="btn btn-success" value="submit">検索</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="mt-3 mb-3 col-md-12 container-fluid">
            <div class="row">
                <form class="col-md-4">
                    <button class="btn btn-danger w-50" onClick="return confirm('選択したアンケートを削除します。よろしいですか？')">アンケートを削除</button>
                </form>
                <div class="ml-auto col-md-4 row">
                    <div class="col-auto mt-2">
                    @if($answers->total() == 0) 
                    {{ '全0件' }}
                    @else
                        全{{ $answers->total() }}件中 {{ ($answers->currentPage() * 10) - 9 }}～{{ ($answers->currentPage() * 10) - 10 + ($answers->count()) }}件表示</div>
                        <div class="col-md-6 pull-right">{!! $answers->render() !!}</div>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <table class="table table-condensed table-striped">
                <thead>
                    <tr>
                        <th><label class="m-0"><input id="checkAll" type="checkbox" value="">全選択</label></th>
                        <th>ID</th>
                        <th>氏名</th>
                        <th>性別</th>
                        <th>年代</th>
                        <th>内容</th>
                        <th class="text-right"></th>
                    </tr>
                </thead>
            @if(isset($answers))
            @if($answers->count())
                <tbody>
                    @foreach($answers as $answer)
                        <tr>
                            <td><label class="font-weight-bold"><input name="answer[]" type="checkbox" value="{{ $answer->id }}"> 選択</label></td>
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
            <h3 class="text-center alert alert-info mt-4">該当するデータはありません</h3>
            @endif
            @endif
    </div>
    <script>
        $(function(){

            var checkAll = '#checkAll'; //「すべて」のチェックボックスのidを指定
            var checkBox = 'input[name="answer[]"]'; //チェックボックスのnameを指定
            var clearFrom = '.clearForm';
            $( checkAll ).on('click', function() {
                $( checkBox ).prop('checked', $(this).is(':checked') );
            });

            $( checkBox ).on( 'click', function() {
                var boxCount = $( checkBox ).length; //全チェックボックスの数を取得
                var checked  = $( checkBox + ':checked' ).length; //チェックされているチェックボックスの数を取得
                if( checked === boxCount ) {
                $( checkAll ).prop( 'checked', true );
                } else {
                $( checkAll ).prop( 'checked', false );
                }
            });

            $( clearFrom ).bind("click", function(){
                $(this.form).find("textarea, :text, select").val("").end().find(":checked").prop("checked", false);
            });
        });
    </script>
</body>
</html>