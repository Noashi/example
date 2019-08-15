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
    <h2>システムへのご意見をお聞かせください</h2>
    <form method="post" action="#">
        <div class="form-group">
            <label for="name">氏名</label>
            <span class="text-danger">※</span>
            <input id="name" type="text" placeholder="入力してください">
        </div>
        <span>性別</span>
        <span class="text-danger">※</span>
        <div class="form-check form-check-inline">
            <input class="form-check-input" name="gender" id="man" type="radio" value="1" checked>
            <label class="form-check-label" for="man" >男性</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" name="gender" id="woman" type="radio" value="2">
            <label class="form-check-label" for="woman">女性</label>
        </div>
        <div class="form-group">
            <label for="age">Select:</label>
            <select id="age" class="form-control">
                <option>Select A</option>
                <option>Select B</option>
            </select>
        </div>
        <div class="form-group">
            <label for="email">メールアドレス</label>
            <span class="text-danger">※</span>
            <input id="email" type="text" placeholder="入力してください">
        </div>
        <div class="form-check">
            <span>メール送信可否</span>
            <p>登録したメールアドレスにメールマガジンをお送りしてもよろしいですか？</p>
            <input class="form-check-input position-static" id="checked" type="checkbox">
            <label for="checked">送信を許可します</label>
        </div>
        <div class="form-group">
            <label for="opinion">ご意見:</label>
            <textarea id="opinion" class="form-control" placeholder="入力してください"></textarea>
        </div>
        <div>
            <button type="submit" class="btn btn-primary mb-2">送信</button>
        </div>
    </form>
</body>
</html>