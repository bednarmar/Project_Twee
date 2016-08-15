<?php

session_start();
if( !isset($_SESSION['user'])){
    header("Location: login.php");
    exit;
}
include_once 'top.inc.php';
include_once "classes/user_class.php";
include_once "classes/tweet_class.php";

if(isset($_POST['addTweet'])) {
		
    $tweet = $conn->escape_string($_POST['tweet_text']);
    $user_id = $_SESSION['user'];
    
    $newTweet = new Tweet($user_id, $tweet);
    $newTweet->create();
    
}

if(isset($_POST['signOutBtn'])) {
    session_destroy();    
    User::logout();
    header("Location: login.php");
    exit;
}

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Main page: Tweet_pro</title>
    </head>  
    <body>
        
        <?php if (isset($_SESSION['message'])){ ?>
	    <div id="msg"> 
                <span style="color: blue"> <?php echo $_SESSION['message']; ?></span>
	    <?php unset($_SESSION['message']); 
        }
        ?>
        
        <div id="addTweet">
        <form id="tweet" action="index.php" method="post">
            <h2>Your status:</h2>
            <hr />
            <div class="input-element">
                <textarea type="text" name='tweet_text' rows='5' cols='40' wrap=VIRTUAL maxlength="140"></textarea>
            </div>
            <div class="action-element">
                <p><button type="submit" class="btn" name="addTweet">Add New Tweet</button></p>
            </div>
        </form>
        </div>
        <hr />
        <div id="logout">
        <form id="logout" action="index.php" method="post">
            <div class="action-element">
                <button type="submit" class="btn" name="signOutBtn">Logout</button>
            </div> 
        </form>
        </div>
        <hr />
        <br>
        <?php
            $userId = $_SESSION['user'];
            $newTweet = new Tweet($userId);
            $posts = $newTweet->show($_SESSION['user']);

            if (count($posts)){
        ?>
        <table border='1' cellspacing='0' cellpadding='5' width='500'>
        <?php
            $newTweet->getAllComments($posts);
        ?>
        </table>
        <?php
            }else{
        ?>
            <p><b>You haven't posted anything yet!</b></p>
        <?php
        }
        ?>

    </body>
</html>
        