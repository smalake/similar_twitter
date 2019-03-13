<!DOCTYPE html>
<html lang="ja">
    <head>
        <title>掲示板</title>
    </head>
    <body>
<?php
require_once("data.php");
require("function.php");
$get_page = 1;
if(isset($_GET['page'])){
    $get_page = $_GET['page'];
}
output($get_page); ?>
       <!-- 投稿フォーム -->
        <form action="send.php" method="post">
            <p>名前:<input type="text" name="username"></p>
            <p><textarea name="comment" rows="8" cols="40"></textarea></p>
            <p>削除用パスワード:<input type="password" name="password"></p>
            <p><input type="submit" name="submit" value="書き込む"></p>
        </form>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="function.js"></script>
    </body>
</html>