<?php

//XSS対策
function htmlchar($str) {
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

function output($now_page){
            //SQL文のセット
            $select = "SELECT * FROM `table`";
            $select_count = "SELECT COUNT( * ) FROM id";
            global $pdo;

            //書き込みの総数を取得
            $stmt_cnt = $pdo->prepare($select_count);
            $stmt_cnt->execute();
            $count = $stmt_cnt->fetchColumn();
            
            //DBから読み出して出力
            if($stmt_sel = $pdo->query($select)){
                foreach($stmt_sel as $row):
                    if($page_count < $now_page):
                        $page_count++;
                    else:
                        if($count <= 10):
                ?>
            <p>No.<?php echo $row["id"] ?></p>
            <p>名前: <?php echo htmlchar($row["username"]) ?>@<?php echo hash('md5',$row["ipaddr"]) ?></p>
            <p><?php echo nl2br(htmlchar($row["comment"])) ?></p>
            <p><?php echo $row["date"] ?>&emsp;<input type="button" value="削除" onclick="delete_button(<?php echo $row['id'] ?>)"></p><hr>
               <?php 
               $count++;
                        else:
                            $next_page = $page_count + 1;
                            $before_page = $page_count - 1;
                            if($page_count === 1):
                        ?>
                        前ページへ
                        <a href='<?php echo "/board/?page={$next_page}"; ?>'>次ページへ</a>
                        <?php else: ?>
                                <a href='<?php echo "/board/?page={$before_page}"; ?>'>前ページへ</a>
                                <a href='<?php echo "/board/?page={$next_page}"; ?>'>次ページへ</a>
                        <?php
                        $count = 0;
                                break;
                                endif;
                    endif;
                endif;
                endforeach;
            }
            else{
                echo "SQLエラー";
            }
}