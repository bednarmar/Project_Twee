<?php

$conn = new mysqli('localhost', 'root', 'coderslab', 'Tweet_pro');

include_once './classes/user.class.php';

$user = new User();
$user->autoLogin();