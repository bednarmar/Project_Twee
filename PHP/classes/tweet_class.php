<?php

class Tweet {
    //private $id;
    private $userId;
    private $text = "";
    private $date;
    
    function getId() 
    {
        return $this->id;
    }

    function getUserId() 
    {
        return $this->userId;
    }

    function getText() 
    {
        return $this->text;
    }

    
    function setUserId($userId) 
    {
        
        $this->userId = $userId;
    }

    function setText($text) 
    {
        $this->text = $text;
    }

    public function __construct($userId = null, $text = null)
    {
        
        $this->setUserId($userId);
        $this->setText($text);
    }
    
    public function loadFromDB()
    {
        $sql = "SELECT * FROM tweet;";
            $result = $conn->query($sql);
            echo 'Znaleziono wyników: '.$result->num_rows.'<br>';
    } 
    
    public function update ($email, $pwd, $pwd2)
    {
        
        if ($pwd != $pwd2) return;
        //nie wiem jeszcze co ma tworzyc, czy tylko same posty czy cos jeszcze
        //Dzięki linijce niżej mamy w $pwdHashed bezpieczne hasło
        $pwdHashed = sha1($pwd); //32 znaki!
    }
    
    public function create ()
    {
        $userId = $this->userId;
        $tweet = $this->text;
        $conn = new mysqli('localhost', 'root', 'coderslab', 'Tweet_pro');
        $stmt = $conn->prepare("INSERT INTO tweet (user_id, tweet, date) VALUES(?, ?, NOW())");
        //echo "Successfully tweet added";
        $_SESSION['message'] = "Your post has been added";
        if (!$stmt){
            die('Error!');
        }
        $stmt->bind_param('is', $userId, $tweet);
        $result = $stmt->execute();
    }
    
    public function show($userId)
    {
        $posts = array();
        $conn = new mysqli('localhost', 'root', 'coderslab', 'Tweet_pro');
	$sql = "SELECT tweet, date FROM tweet WHERE user_id = '$userId' ORDER BY date DESC";
	$result = $conn->query($sql);  
	
        while($allPosts = mysqli_fetch_object($result)){
	    $posts[] = array('date' => $allPosts->date, 'user_id' => $userId, 'tweet' => $allPosts->tweet);
	}
	return $posts;
    }
    
    public function getAllComments($post)
    {
        //przeniesc do klacy User do getAllTweets
        $posts = $post;
        foreach ($posts as $key => $list){
	echo "<tr valign='top'>\n";
	echo "<td>".$list['user_id'] ."</td>\n";
	echo "<td>".$list['tweet'] ."<br/>\n";
	echo "<span  style='font-size: 9px;'>".$list['date'] ."</span></td>\n";
	echo "</tr>\n";
        }
    }
    
    
    
}    