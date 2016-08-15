<?php

class Comment {
    private $commentId;
    private $userId;
    private $tweetId;
    private $comment = "";
    private $commentDate;
    
    function getCommentId() {
        return $this->commentId;
    }
    
    function getUserId() {
        return $this->userId;
    }

    function getTweetId() {
        return $this->tweetId;
    }

    function getComment() {
        return $this->comment;
    }

    function getCommentDate() {
        return $this->commentDate;
    }

    function setUserId($userId) {
        $this->userId = $userId;
    }

    function setTweetId($tweetId) {
        $this->tweetId = $tweetId;
    }

    function setComment($comment) {
        $this->comment = $comment;
    }

    function setCommentDate($commentDate) {
        $this->commentDate = $commentDate;
    }

    public function __construct($userId = null, $tweetId = null,$comment = null, $commentDate = null)
    {
        
        $this->setUserId($userId);
        $this->setTweetId($tweetId);
        $this->setComment($comment);
        $this->setCommentDate($commentDate);
    }
    
    public function loadFromDB()
    {
        $sql = "SELECT * FROM comment;";
            $result = $conn->query($sql);
            echo 'Znaleziono wyników: '.$result->num_rows.'<br>';
    }
    
    public function create ()
    {
        
    }   
    
    public function show()
    {
        
    }
    
    public function update()
    {
        
    }        
}

