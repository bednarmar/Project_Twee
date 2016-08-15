<?php

class User {
    private $email;
    private $pwd;
    
    public function __construct($email,$pwd)
    {
        $this->setEmail($email);
        $this->setPwd($pwd);
    } 
    
    public function getEmail()
    {
        return $this->email;
    }

    public function getPwd()
    {
        return $this->pwd;
    }

    public function setEmail($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->email = $email;
        }else{
            echo "This $email email address is not valid. <br>";
            $this->email =NULL;
        }
    }

    public function setPwd($pwd) 
    {
        $this->pwd = sha1($pwd);
    }
    
    public function register($anotherPwd)
    {
        $pwd = $this->pwd;
        $email = $this->email;
        $pwd2= sha1($anotherPwd);   
           
        if($email == NULL){
            echo "Let's try another one";
        }else{
        $conn = new mysqli('localhost', 'root', 'coderslab', 'Tweet_pro');
            $sql = "SELECT email FROM user WHERE email='$email'";
            $result = $conn->query($sql);
            $count = mysqli_num_rows($result); 
            if ($pwd != $pwd2){
                echo "passwords are not the same";
            }else if ($count==0 && $pwd === $pwd2){
                $password = $pwd;
                $stmt = $conn->prepare("INSERT INTO user(email, password) VALUES(?, ?)");
                echo "Successfully registered, you may login now";
                if (!$stmt){
                    die('Błąd!');
                }
                $stmt->bind_param('ss', $email, $password);
                $result = $stmt->execute();
            }else{
                echo "Email already in use";
                header("Location: login.php");
            }
        }    
    }
    
    public function login()
    {
        $conn = new mysqli('localhost', 'root', 'coderslab', 'Tweet_pro');
        $email= $this->email;
        $pwd= $this->pwd;
        
        $sql = "SELECT * FROM user WHERE email='$email'";
                $res = $conn->query($sql);
		$row=mysqli_fetch_array($res);
		//$row= $res->fetch_array;
		$count = mysqli_num_rows($res); // jezeli podane prawidlowo powinno dac 1
		//$count = $res->num_rows;
        if( $count == 1 && $row['password']== $pwd) { //w seterze szyfruje
	    $_SESSION['user'] = $row['user_id'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['pwd'] = $row['password'];
	    header("Location: index.php");
            echo "cos sie dzieje";
	} else {
	    echo "Email or password incorect, please try again...";
	}
    }
    
    public function autoLogin()
    {
        session_start();
        
        $this->login($_SESSION['email'], $_SESSION['pwd']);
    }
    
    static public function logout()
    {
        $_SESSION['user'] = null;
        $_SESSION['email'] = null;
        $_SESSION['pwd'] = null;
        
        session_destroy();
    }
    
    public function isLogged()
    {
        if(isset($_SESSION['user']) && isset($_SESSION['email']) && isset($_SESSION['password'])) {
            return true;
        }
    }
    
    //poniżej przydatne dodatkowe funkcje jakie powinien posiadac uzytkownik
    public function getMyMsgs()
    {
    //funkcja pobierajaca wpisy uzytkownika,mozna rozbic na wyslane i odebrane.    
    }
    
    public function getMyEntries()
    {
    // sprawdza wejscia uzytkownika   
    }
    
    public function loadAllTweets()
    {
        
    }        
    
    private function loadDataFromDB($column, $table)
    {
        $sql = "SELECT '$column' FROM '$table';";
        $result = $conn->query($sql);
        echo 'Znaleziono wyników: '.$result->num_rows.'<br>';
    }
}




