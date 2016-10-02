<?php

session_start();
if( !isset($_SESSION['user'])){
    header("Location: login.php");
    exit;
}
include_once 'top.inc.php';
//I have to add information about tweetID
if(isset($_POST['addComment'])) {

    $comment = $conn->escape_string($_POST['comment_text']);
    $user_id = $_SESSION['user'];

    $newComment = new Comment($user_id, $tweet_id, $comment);
    $newComment->createComment();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Main page: Tweet_pro</title>
        <link rel="stylesheet" href="css/style.css" type="text/css" />
    </head>
    <body>

        <?php if (isset($_SESSION['message'])){ ?>
        <div id="msg">
        <span style="color: blue"> <?php echo $_SESSION['message']; ?></span>
        <?php unset($_SESSION['message']);
         }
        ?>

        <div id="addComment">
            <form id="comment" action="" method="post">
                <h2>Your comments:</h2>
                <hr />
                <div class="input-element">
                    <textarea type="text" name='comment_text' rows='5' cols='40' wrap=VIRTUAL maxlength="140"></textarea>
                </div>
                <div class="action-element">
                    <p><button type="submit" class="btn" name="addComment">Add New Comment</button></p>
                </div>
            </form>

     </body>
</html>

<?php
    include_once 'foot.inc.php';
?>