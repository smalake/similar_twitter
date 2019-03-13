<?php

require_once("data.php");
//POSTされたIDを格納
$id = $_POST["id"];

//DBからクリックされたIDの削除用パスワードを取得
$search = "SELECT `password` FROM `table` WHERE id = :id";
$stmt_search = $pdo->prepare($search);
$stmt_search->execute(array(":id" => $id));
$result = $stmt_search->fetch();

//入力されたパスワードと設定パスワードを比較して削除
if($result["password"] === $_POST["password"]){
    $delete = "DELETE FROM `table` WHERE id = :id";
    $stmt_del = $pdo->prepare($delete);
    $stmt_del->execute(array(":id"=>$id));
    echo "OK";
}
else{
    echo "パスワードが違います。";
}