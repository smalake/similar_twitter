<?php

//DB接続
try{
    $pdo = new PDO("mysql:host=127.0.0.1;dbname=board_db; charset=utf8","wynn-eng","Miyabin1002");
}
catch(PDOException $e){
    echo "Error:{$e->getMessage()}";
    die();
}