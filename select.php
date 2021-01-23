<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mask gallary</title>
  <link href="css/reset.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
</head>
<body>
<ul>
  <a href="./select.php" id="brand">Mask gallary</a>
  <nav>
    <ul>
      <a href="./select_buy.php" class="nav_item">マスクを買う</a>
      <a href="./upload_form.php" class="nav_item">マスクを売る</a>
      <!-- <a href="./upload_form.php" class="nav_item">マスクを売る</a> -->
    </ul>
  </nav>
  <form id="form1" action="#">
      <input id="sbox"  id="s" name="s" type="text" placeholder="ここでは検索できません" />
      <input id="sbtn" type="submit" value="検索" />
  </form>
  <a href="./login.php" class="nav_item">ログイン</a>
  <a href="./logout.php" class="nav_item">ログアウト</a>
</ul>
  <div id="toppage">
    <div>自分にあうマスクを見つけよう</div>
    <!-- <div class="back"><a href="./select_buy.php">>>商品一覧に戻る</a></div> -->
    <button type="button" name="aaa" value="aaa" id="testbutton" onclick="location.href='./select_buy.php'">商品一覧を見てみる</button>
  </div>
</body>
</html>