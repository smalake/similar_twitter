<?php

class User {
    private $username;
    private $comment = array();
    private $dateTime = array();
    public function __construct($username){
        $this->username = $username;
    }
    //IDでコメントと日時を紐づけ
    public function setComment($comment,$comment_id){
        $this->comment[$comment_id] = $comment;
    }
    public function setDate($dateTime,$comment_id){
        $this->dateTime[$comment_id] = $dateTime;
    }
}

class Timeline {
    private static $comment_id = 0;
    private $comment = array();
    private $dateTime = array();
    
    public function setComment($comment,$comment_id){
        $this->comment[$comment_id] = $comment;
        self::$comment_id = $comment_id + 1;
    }
    public function setDateTime($dateTime,$comment_id){
        $this->dateTime[$comment_id] = $dateTime;
        self::$comment_id = $comment_id;
    }
    public function getComment(){
        echo "<br>";
        foreach($this->comment as $comment){
            echo $comment."<hr>";
        }
    }
    public static function getId(){
        return self::$comment_id;
    }
}