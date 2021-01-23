<?php
// 書くと、中の変数が使えるようになる

require_once('funcs.php');

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
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
      <input id="sbox"  id="s" name="s" type="text" placeholder="キーワードを入力" />
      <input id="sbtn" type="submit" value="検索" />
  </form>
</ul>

<div id="thank">
  <div>回答ありがとうございました</div>
  <div class="back"><a href="./select_buy.php">>>商品一覧に戻る</a></div>
</div>