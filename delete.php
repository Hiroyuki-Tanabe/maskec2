<?php

// 0. SESSION開始！！
session_start();

require_once('funcs.php');
loginCheck();

$pdo = db_conn();
$id = $_GET['id'];
//２．データ登録SQL作成
$stmt = $pdo->prepare('DELETE FROM kadai WHERE id = :id');
// ↓追加
$stmt->bindValue(':id', h($id), PDO::PARAM_INT);
$status = $stmt->execute();
//３．データ表示
if ($status == false) {
    sql_error($status);
} else {
    redirect('./select_buy.php');
}