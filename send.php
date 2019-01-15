<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once("data.php");

    $comment_id = $comment::getId() + 1;
    $comment->setComment($_POST["comment"], $comment_id);
    echo $comment_id;

    $insert = "INSERT INTO `table` (id, username, comment, date) VALUES (:id, :username, :comment, :date)";
    $stmt = $pdo->prepare($insert);
    $param = array(':id' => $comment_id, ':username' => 'testuser', ':comment' => $_POST['comment'], ':date' => date("Y-m-d H:i:s"));
    $stmt->execute($param);
}
else{
    echo '<script type="text/javascript">alert("不正な操作です。最初からやり直してください。"); location.href = "http://localhost/board";</script>';
    exit;
}