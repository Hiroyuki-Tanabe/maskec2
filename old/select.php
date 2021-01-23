<?php
// 書くと、中の変数が使えるようになる
require_once('funcs.php');


//1.  DB接続します
try {
  //Password:MAMP='root',XAMPP=''
  $pdo = new PDO('mysql:dbname=kadai;charset=utf8;host=localhost','root','root');
} catch (PDOException $e) {
  exit('DBConnectError'.$e->getMessage());
}

//２．データ取得SQL作成
$stmt = $pdo->prepare("SELECT * FROM kadai");
$status = $stmt->execute();

//３．データ表示
$view="";
if ($status==false) {
    //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);

}else{
  //Selectデータの数だけ自動でループしてくれる
  //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
    $view .= '<div id="product">
                <div id="upfile"><img src="' . $result['file_path'] . '" alt="" class="image"></div>
                <div id="content">
                  <div id="name">'.h($result['name']).'</div>
                  <div id="size">'.h($result['size']).'サイズ</div>
                  <div id="price">¥'.h($result['price']).'</div>
                </div>
              </div>';

            //   $view .= '<div id="product">
            //   <div id="upfile">商品画像</div>
            //   <div id="content">
            //     <div id="name">'.h($result['name']).'</div>
            //     <div id="price">¥'.h($result['price']).'</div>
            //     <div id="size">'.h($result['size']).'サイズ</div>
            //   </div>
            // </div>';
  }

}
?>


<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>フリーアンケート表示</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
<link href="css/reset.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<!-- <link rel="stylesheet" href="css/range.css"> -->
<!-- <link href="css/bootstrap.min.css" rel="stylesheet"> -->
<!-- <style>div{padding: 10px;font-size:16px;}</style> -->
</head>
<body>
<!-- Head[Start] -->
<ul>
  <a href="upload_form.php" id="brand">Mask gallary</a>
  <nav>
    <ul>
      <li class="nav"><a href="/">マスクを買う</a>
      <li class="nav"><a href="/menu">マスクを売る</a>
      <li class="nav"><a href="/about/"> レビューを投稿</a>
    </ul>
  </nav>
  <form id="form1" action="自分のサイトURL">
      <input id="sbox"  id="s" name="s" type="text" placeholder="キーワードを入力" />
      <input id="sbtn" type="submit" value="検索" />
  </form>
</ul>

<!-- Head[End] -->

<!-- Main[Start] -->
<div class="grid-container">
  <li class="grid">グリッドアイテム</li>
  <li class="grid">グリッドアイテム</li>
  <li class="grid">グリッドアイテム</li>
  <li class="grid">グリッドアイテム</li>
  <li class="grid">グリッドアイテム</li>
  <li class="grid">グリッドアイテム</li>
  <li class="grid">グリッドアイテム</li>
  <li class="grid">グリッドアイテム</li>
  <li class="grid">グリッドアイテム</li>
</div>
<div>
    <div class="container"><?= $view; ?></div>
</div>

<!-- Main[End] -->

</body>
</html>
