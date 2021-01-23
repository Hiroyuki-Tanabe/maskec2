<?php
// 書くと、中の変数が使えるようになる
require_once('funcs.php');

$choice = $_GET["choice_price"];

if ($choice == 'new') {
    $sql = "SELECT * FROM kadai ORDER BY id DESC";
} elseif ($choice == 'reasonable') {
    $sql = "SELECT * FROM kadai ORDER BY price";
} elseif ($choice == 'expensive') {
    $sql = "SELECT * FROM kadai ORDER BY price DESC";
} else {
    $sql = "SELECT * FROM kadai ORDER BY id DESC";
}

//1.  DB接続します
try {
    //Password:MAMP='root',XAMPP=''
    $pdo = new PDO('mysql:dbname=kadai;charset=utf8;host=localhost', 'root', 'root');
} catch (PDOException $e) {
    exit('DBConnectError'.$e->getMessage());
}

//２．データ取得SQL作成
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();

//３．データ表示
$view="";
if ($status==false) {
    //execute（SQL実行時にエラーがある場合）
    $error = $stmt->errorInfo();
    exit("ErrorQuery:".$error[2]);
} else {
    //Selectデータの数だけ自動でループしてくれる
    // FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $view .= '<div class="product">
                    <form action="./select_detail.php" method="get">
                      <button type="submit" name="id" value='. h($result['id']) . '><img src="' . h($result['file_path']) . '" alt="" class="image"></button>
                    </form>
                      <div id="content">
                        <div id="name">'.h($result['name']).'</div>
                        <div id="size">'.h($result['size']).'サイズ</div>
                        <div id="price">¥'.h($result['price']).'</div>
                      </div>              
                  </div>';
    }

}

// 検索フォーム
// 1.  DB接続は済み
// 2. 検索用のSQLを設置
$search = $_POST["search"];
if ($search !== NULL) {

  // $sql2 = "SELECT * FROM kadai WHERE NAME LIKE '%B%'";
  $sql2 = "SELECT * FROM kadai WHERE NAME LIKE '%" . $search . "%'";
  $stmt2 = $pdo->prepare($sql2);
  $status2 = $stmt2->execute();

  //2-３．データ表示
  $view="";
  if ($status2==false) {
      //execute（SQL実行時にエラーがある場合）
      $error = $stmt2->errorInfo();
      exit("ErrorQuery:".$error[2]);
  } else {
      //Selectデータの数だけ自動でループしてくれる
      //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
      while ($result = $stmt2->fetch(PDO::FETCH_ASSOC)) {
        $view .= '<div class="product">
                    <form action="./select_detail.php" method="get">
                      <button type="submit" name="id" value='. h($result['id']) . '><img src="' . h($result['file_path']) . '" alt="" class="image"></button>
                    </form>
                      <div id="content">
                        <div id="name">'.h($result['name']).'</div>
                        <div id="size">'.h($result['size']).'サイズ</div>
                        <div id="price">¥'.h($result['price']).'</div>
                      </div>              
                  </div>';

      }
  }

}

// サイズによる絞り込み
// $size_S = $_GET['size_S'];
// $size_M = $_GET['size_M'];
// $size_L = $_GET['size_L'];
// $size_LL = $_GET['size_LL'];
// // var_dump($size_S, $size_M, $size_L, $size_LL);
// $keywords = [$size_S, $size_M, $size_L, $size_LL];
// var_dump('$keywords' . $keywords);
// print_r($keywords);

// $keywordCondition = [];
// foreach ($keywords as $keyword) {
//   if ($keyword !== NULL) {
//     $keywordCondition[] = 'size LIKE "%' . $keyword . '%"';
//   }
// }
// $keywordCondition = implode(' OR ', $keywordCondition);
// var_dump('$keywordCondition, ' . $keywordCondition);
// // $keywordCondition = ' WHERE ' . $keywordCondition;
// // var_dump($keywordCondition);

// $cnt = count($keywords, NULL);
// echo 'NULL数は'. $cnt;

// if (count($keywords, NULL)  != 1) {
//   $where = ' WHERE ';
//   echo 'nullじゃない';
// } else {
//   $where = '';
// }

// if ($cnt !=1) {
//     // $sql2 = "SELECT * FROM kadai WHERE NAME LIKE '%B%'";
//     $sql2 = "SELECT * FROM kadai". $where . $keywordCondition;
//     // $sql2 = "SELECT * FROM kadai WHERE SIZE LIKE '%$size_S%'";
//     $stmt2 = $pdo->prepare($sql2);
//     $status2 = $stmt2->execute();
// }
// var_dump($sql2);
// //2-３．データ表示
// $view="";
// if ($status2==false) {
//     //execute（SQL実行時にエラーがある場合）
//     $error = $stmt2->errorInfo();
//     exit("ErrorQuery:".$error[2]);
// } else {
//     //Selectデータの数だけ自動でループしてくれる
//     //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
//     while ($result = $stmt2->fetch(PDO::FETCH_ASSOC)) {
//       $view .= '<div class="product">
//                   <form action="./select_detail.php" method="get">
//                     <button type="submit" name="id" value='. h($result['id']) . '><img src="' . h($result['file_path']) . '" alt="" class="image"></button>
//                   </form>
//                     <div id="content">
//                       <div id="name">'.h($result['name']).'</div>
//                       <div id="size">'.h($result['size']).'サイズ</div>
//                       <div id="price">¥'.h($result['price']).'</div>
//                     </div>              
//                 </div>';

//     }
// }



?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>商品一覧</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
<link href="css/reset.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
</head>

<body>
<!-- Head[Start] -->
<ul>
  <a href="./select.php" id="brand">Mask gallary</a>
  <nav>
    <ul>
      <a href="./select_buy.php" class="nav_item">マスクを買う</a>
      <a href="./upload_form.php" class="nav_item">マスクを売る</a>
    </ul>
  </nav>
  <form id="form1" action="#" method="post">
      <input id="sbox"  id="s" name="search" type="text" placeholder="マスクを探す" />
      <input id="sbtn" type="submit" value="検索" />
  </form>
  <a href="./login.php" class="nav_item">ログイン</a>
  <a href="./logout.php" class="nav_item">ログアウト</a>
</ul>

<!-- <form action="#" method="post">
  マスク名：<input type="text" name="search">
  <input type="submit">
</form> -->

<!-- Head[End] -->

<!-- Main[Start] -->
<div class="choice buy">
  <!-- 価格で選ぶ -->
  <div id="table">
    <form action="#" method="get">
      <select name="choice_price" id="choice_price" onchange="submit(this.form)">
        <option value="new" 
          <?php echo array_key_exists('choice_price', $_GET) && $_GET['choice_price'] == 'new' ? 'selected' : ''; ?>>新着順
        </option>
        <option value="reasonable"
          <?php echo array_key_exists('choice_price', $_GET) && $_GET['choice_price'] == 'reasonable' ? 'selected' : ''; ?>>価格の安い順
        </option>
        <option value="expensive"
        <?php echo array_key_exists('choice_price', $_GET) && $_GET['choice_price'] == 'expensive' ? 'selected' : ''; ?>>価格の高い順</option>
      </select>
    </form>
  </div>
  <!-- サイズで選ぶ -->
  <div>
  <form action="#" method="get">
    <input type="checkbox" name="size_S" value="S">S
    <input type="checkbox" name="size_M" value="M">M
    <input type="checkbox" name="size_L" value="L">L
    <input type="checkbox" name="size_LL" value="LL">LL~
  <p>
    <input type="submit" value="送信する">
  </p>
  </form>
  </div>
</div>

<div class="container"><?= $view; ?></div>
<!-- <div class="container2"><?= $search; ?></div> -->


<!-- Main[End] -->

<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- <script src="./js/kadai.js"></script> -->

<script type="text/javascript" src="./js/kadai.js"></script>
</body>
</html>



