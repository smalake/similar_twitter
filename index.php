<!DOCTYPE html>
<html lang="ja">
    <head>
        <title>掲示板</title>
        <?php require_once("data.php"); ?>
    </head>
    <body>
<?php
        $select = "SELECT * FROM `table`";
        if($stmt_sel = $pdo->query($select)){
            foreach($stmt_sel as $row){
                $comment->setComment($row["comment"],$row["id"]);
                $comment->setDateTime($row["date"],$row["id"]);
                //$username = row["username"];
            }
        }
        else{
            echo "SQLエラー";
        }
        ?>

              <?php echo $comment->getComment() ?>
       //投稿フォーム
        <form action="send.php" method="post">
            <input type="text" name="comment" maxlength="140" placeholder="投稿内容を書いてください">
            <input type="submit" name="submit">
        </form>
    </body>
</html>