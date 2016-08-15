<?php

session_start();
if( isset($_SESSION['user'])!="" ){
    header("Location: index.php");
    exit;
}
include_once 'top.inc.php';
include_once "classes/user_class.php";

if(isset($_POST['registerBtn'])) {
		
    $email = $conn->escape_string($_POST['email']);
    $pwd = $conn->escape_string($_POST['pwd']);
    $pwd2 = $conn->escape_string($_POST['pwd2']);
	
    $newUser = new User($email, $pwd);
    $newUser->register($pwd2);
    	
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Register new User</title>
        <meta charset="UTF-8">
    </head>
    <body>
        <div id="register">
            <form id="register-form" action="register_form.php" method="post">
      	        <div>
                    <h2>Create an account:.</h2>
                </div>
                <div>
                    <p>Please fill up registration form</p>
                </div>
                <hr />
                <?php if (isset($_SESSION['message'])){ ?>
	            <div id="msg"> 
                        <span style="color: blue"> <?php echo $_SESSION['message']; ?></span>
	        <?php unset($_SESSION['message']); 
                }
                ?>
 
                <div class="input-element">
                    <input type="text" name="email" maxlength="50" class="form-control" placeholder="Your Email" required />
                </div>
                <br>    
                <div class="input-element">
                    <input type="password" name="pwd" maxlength="50" class="form-control" placeholder="Your Password" required />
                </div> 
                <br>
                <div class="input-element">
                    <input type="password" name="pwd2" maxlength="50" class="form-control" placeholder="Repeat Your Password" required />
                </div>
                <hr />    
                <div class="action-element">
                    <button type="submit" class="btn" name="registerBtn">Sign Up</button>
                </div>    
                <hr />    
                <div class="action-element">
                    <p>If you have account, click here:</p>
                    <a href="login.php">Sign In Here</a>
                </div>    
            </form>
        </div>     
        
    </body>
</html>
 
 