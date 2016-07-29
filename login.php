<?php

include_once './top.inc.php';

if ($user->isLogged()){
    header('Location: index.php');
/*tutaj przenosi do indeksu jesli jest zalogowany, dlatego odwolanie jest przypisane do nagłowk
 * bo nagłówki sa najpierw wysyłane i takie odesłanie nie zadziała jsli cos 
 * zostanie wykonane wczesniej.
 */
}

echo 'ZALOGUJ SIĘ, TU JEST FORMULARZ';

//Tutaj już odbieramy dane:
$email = $_POST['email'];
$pwd = sha1($_POST['pwd']);//tu już szyfruje wprowadzone dane

$user->login($email, $pwd);

include_once './foot.inc.php';