<?php

// ③DBへの保存
require_once "./dbc.php";

// ファイル以外の取得
$name = $_POST['name'];
$size = $_POST['size'];
$price = $_POST['price'];
// var_dump($name);

// ファイル関連の取得
$file = $_FILES['img'];
$filename = basename($file['name']);
$tmp_path = $file['tmp_name'];
$filr_err = $file['error'];
$filesize = $file['size'];
// $upload_dir = '/Applications/MAMP/htdocs/kadai02_test/test3/images';
$upload_dir = './images/';
$save_filename = date('YmdHis') . $filename;
$err_msgs = array();
$save_path = $upload_dir . $save_filename;

// 商品名のバリデーション
if(empty($name)) {
    array_push($err_msgs, '・商品名を入力してください');
}

// 価格のバリデーション
if($price === "0") {
    // 0円でないか
    array_push($err_msgs, '・無料での出品は禁止されています');
} else if(empty($price)) {
    // 入力されているか
    array_push($err_msgs, '・価格を入力してください');
}


// キャプションを取得
$caption = filter_input(INPUT_POST, 'caption',
FILTER_SANITIZE_SPECIAL_CHARS);

// キャプションのバリデーション
// 未入力
if (empty($caption)) {
    array_push($err_msgs, '・キャプションを入力してください');
}
// 140文字以内か
if(strlen($caption) > 140) {
    array_push($err_msgs, '・キャプションは140文字以内で入力してください');
}

// ファイルのバリデーション
// 拡張子は画像形式か
$allow_ext = array('jpg', 'jpeg', 'png');
$file_ext = pathinfo($filename, PATHINFO_EXTENSION);

if(!in_array(strtolower($file_ext),$allow_ext )){
    array_push($err_msgs, '・画像ファイルを添付してください');
}

if(count($err_msgs) == 0) {
    // ファイルはあるか
    if(is_uploaded_file($tmp_path)) {
        if(move_uploaded_file($tmp_path, $save_path)) {
            echo $filename . 'を' . $upload_dir . 'にアップしました。';
            // DBに保存（ファイル名、ファイルパス、キャプション）
            $result = fileSave($name, $size, $price, $filename, $save_path, $caption);

            if ($result) {
                echo 'データベースに保存しました！';
            } else {
                echo 'データベースへの保存に失敗しました';
            }

        }else {
            echo 'ファイルが保存できませんでした';
        }
        
    } else {
        echo 'ファイルが選択されていません。';
    }
} 


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/reset.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <title>Document</title>
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
  <form id="form1" action="#" method="post">
      <input id="sbox"  id="s" name="search" type="text" placeholder="マスクを探す" />
      <input id="sbtn" type="submit" value="検索" />
  </form>
  <a href="./login.php" class="nav_item">ログイン</a>
  <a href="./logout.php" class="nav_item">ログアウト</a>
</ul>

<div class="err_msgs">

<p>
<?php
if(count($err_msgs) === 0){

}else{
    foreach($err_msgs as $msg){
        echo $msg;
        echo '<br>';
    }
}
?>
</p>
</div>
<div class="err_msgs child">
    <a href = "upload_form.php">商品登録画面に戻る</a>
</div>


</body>
</html>