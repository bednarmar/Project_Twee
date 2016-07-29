<?php
include_once './top.inc.php';

if (!$user->isLogged()){
    header('Location: login.php');
//przenosi jak nie jest zalogwany do loginu.tłumaczeniie hedera w loginie
}

include_once './foot.inc.php';
