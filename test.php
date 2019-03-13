<?php

require_once("data.php");

$id = (int)$_POST["id"];

$search = "SELECT `password` FROM `table` WHERE id = :id";
if($stmt_search = $pdo->prepare($search)){
    $stmt_search->bindValue(":id",$id,PDO::PARAM_INT);
    $stmt_search->execute();
    $result = $stmt_search->fetch();
    echo $result["password"];
}
else{
    echo "fail";
}

/*
if($result["password"] == $_POST["password"]){
    $delete = "DELETE FROM `table` WHERE id = :id";
    $stmt_del = $pdo->prepare($delete);
    $stmt_del->execute(array(":id"=>$id));
    echo "OK";
}
else{
    echo "パスワードが違います。";
}
*/