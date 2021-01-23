<?php
//PHP:コード記述/修正の流れ
//1. insert.phpの処理をマルっとコピー。
//   POSTデータ受信 → DB接続 → SQL実行 → 前ページへ戻る
//2. $id = POST["id"]を追加
//3. SQL修正
//   "UPDATE テーブル名 SET 変更したいカラムを並べる WHERE 条件"
//   bindValueにも「id」の項目を追加
//4. header関数"Location"を「select.php」に変更
require_once('funcs.php');
//1. POSTデータ取得
$name   = $_POST["name"];
$size   = $_POST["size"];
$price   = $_POST["price"];
$caption   = $_POST["caption"];
$id   = $_POST["id"];

var_dump($name, $size, $price, $caption, $id);



//2. DB接続します
$pdo = db_conn();
//３．データ登録SQL作成
$stmt = $pdo->prepare("UPDATE
                            kadai
                        SET
                            name = :name,
                            size = :size,
                            price = :price
                        WHERE
                            id = :id ;
                        ");
$stmt->bindValue(':name', h($name), PDO::PARAM_STR);      //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':size', h($size), PDO::PARAM_STR);    //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':price', h($price), PDO::PARAM_INT);        //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':id', h($id), PDO::PARAM_INT); 
$status = $stmt->execute(); //実行
//４．データ登録処理後
if ($status == false) {
    sql_error($stmt);
} else {
    redirect("./select_detail.php?id=$id");
}