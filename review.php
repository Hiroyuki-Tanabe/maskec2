<?php

// 0. SESSION開始！！
session_start();
// 書くと、中の変数が使えるようになる

require_once('funcs.php');
loginCheck();

$id = $_POST['id'];
$mask_name = $_POST['mask_name'];

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>レビュー投稿</title>
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
    </ul>
  </nav>
  <form id="form1" action="自分のサイトURL">
      <input id="sbox"  id="s" name="s" type="text" placeholder="このページでは検索できません" />
      <input id="sbtn" type="submit" value="検索" />
  </form>
</ul>


<div>
  <form enctype="multipart/form-data" action="./review_insert.php" method="POST">
  <div>
    <table rules="rows" class="table_review">
    <tr align="left">
      <th id="aa">商品名</th>
      <td name="id"><?php echo $mask_name ?></td>
      <input type="hidden" name="id" value= "<?php echo $id ?>">
    </tr>
    <tr align="left">
      <th id="reviewer">お名前</th>
      <td name="reviewer"><input type="text" name="reviewer"></td>
    </tr>
    <tr align="left">
      <th>総合評価</th>
      <td>
        <select name="valuation">
          <option value="S">S</option>
          <option value="A">A</option>
          <option value="B">B</option>
          <option value="C">C</option>
        </select>
      </td>
    </tr>
    <tr align="left">
    <th>フリーコメント</th>
      <td><textarea
            name="comment"
            placeholder="自由に感想を記載してください"
            id="caption"
          ></textarea></td>
    </tr>
    <tr>
      <th align="left">-</th>
      <td align="right"><a href="./select_buy.php">>>商品一覧に戻る  </a><input type="submit" value="投稿" class="button" /></td>
    </tr>
    </div>
  </form>
</body>
</html>