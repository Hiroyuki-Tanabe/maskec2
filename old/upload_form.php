<!-- ①フォームの説明 -->
<!-- ②$_FILEの確認 -->
<!-- ③バリデーション -->
<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>アップロードフォーム</title>
    <link href="css/reset.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
  </head>

  <body>

    <ul>
      <a href="./select.php" id="brand">Mask gallary</a>
      <nav>
        <ul>
          <li class="nav"><a href="./select_buy.php">マスクを買う</a>
          <li class="nav"><a href="./upload_form.php">マスクを売る</a>
          <li class="nav"><a href="#"> レビューを投稿</a>
        </ul>
      </nav>
      <form id="form1" action="自分のサイトURL">
          <input id="sbox"  id="s" name="s" type="text" placeholder="キーワードを入力" />
          <input id="sbtn" type="submit" value="検索" />
      </form>
    </ul>

    <div id="choice">
      <form enctype="multipart/form-data" action="./file_upload.php" method="POST">
        <label>商品名：<input type="text" name="name"></label><br>
        <label>サイズ：<input type="text" name="size"></label><br>
        <label>価格：<input type="text" name="price"></label><br>
        <div class="file-up">
          <input name="img" type="file" accept="image/*" />
        </div>
        <div>
          <textarea
            name="caption"
            placeholder="キャプション（140文字以下）"
            id="caption"
          ></textarea>
        </div>
        <div class="submit">
          <input type="submit" value="登録" class="btn" />
        </div>
      </form>
    </div>

  </body>
</html>
