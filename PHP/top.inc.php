<?php

$conn = new mysqli('localhost', 'root', 'coderslab', 'Tweet_pro');

if ($conn->connect_error){
    die("Offline, sorry. ");
}

include_once './classes/user_class.php';

//$user = new User();
//$user->autoLogin();