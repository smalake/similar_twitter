<?php

//POSTされた場合のみ処理
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once("data.php");

    //DBへINSERTしてTOPへ戻る
    $insert = "INSERT INTO `table` (username, comment, password, date, ipaddr) VALUES (:username, :comment, :password, :date, :ipaddr)";
    $stmt = $pdo->prepare($insert);
    $param = array(':username' => $_POST['username'], ':comment' => $_POST['comment'], ':password' => $_POST['password'], ':date' => date("Y-m-d H:i:s"), ':ipaddr' => $_SERVER["REMOTE_ADDR"]);
    $stmt->execute($param);
    header("Location:index.php");
    exit();
}
else{
    //POST以外はキャンセル
    echo '<script type="text/javascript">alert("不正な操作です。最初からやり直してください。"); location.href = "http://localhost/board";</script>';
    exit;
}