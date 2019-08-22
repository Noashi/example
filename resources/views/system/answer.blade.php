<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>アンケート詳細</title>
    <!-- ① CSS を追加 -->
    <link rel="stylesheet" href="/css/app.css">
    <!-- ② JavaScript を追加 -->
    <script src="/js/app.js" defer></script>
</head>
<body>
    <div class="container py-5">
        <h3 class="text-left mb-3">アンケート管理システム</h3>
        <form class="ml-5" method="post" action="">
        @csrf
            <div class="form-group row">
                <label class="col-form-label col-sm-3" for="id">ID</label>
                <div class="col-sm-9">
                    <p>{{ $answer->id }}</p>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-form-label col-sm-3" for="name">氏名</label>
                <div class="col-sm-9">
                    <p>{{ $answer->fullname }}</p>
                </div>
            </div>
            <div class="row mb-2">
                <span class="col-sm-3">性別</span>
                <div class="col-sm-9">
                    <p>
                    @if($answer->gender == 1) 
                        {{ '男性' }}
                    @elseif ($answer->gender == 2)
                        {{ '女性' }}
                    @endif
                    </p>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-form-label col-sm-3" for="age">年代</label>
                <div class="col-sm-9">
                    <p>@foreach($ages as $age)
                            @if ($age->sort == $answer->age_id)
                                {{ $age->age }}
                            @endif
                       @endforeach</p>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-form-label col-sm-3" for="email">メールアドレス</label>
                <div class="col-sm-9">
                    <p>{{ $answer->email }}</p>
                </div>
            </div>
            <div class="checkbox row">
            <span class="col-sm-3">メール送信可否</span>
                <div class="col-sm-9">
                    <p>
                    @if ($answer->is_sent_email == 1)
                        {{ '送信許可' }}
                    @elseif ($answer->is_sent_email == 0)
                        {{ '送信不可' }}
                    @endif
                    </p>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3" for="feedback">ご意見</label>
                <div class="col-sm-9">
                    <!-- 改行を反映 -->
                    <p>{!! nl2br(htmlspecialchars($answer->feedback, ENT_QUOTES, 'UTF-8', false), false) !!}</p>   
                </div>
            </div>
            <div class="form-group row">
                <label class="col-form-label col-sm-3" for="id">登録日時</label>
                <div class="col-sm-9">
                    <p>{{ $answer->created_at }}</p>
                </div>
            </div>
            <div class="btn-toolbar">
                <div class="mx-auto mb-2">
                    <a class="btn btn-success" href="{{ route('home') }}">一覧へ戻る</a>
                    <button name="action" type="submit" class="btn btn-danger" value="">削除</button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>