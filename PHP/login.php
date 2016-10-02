<?php
session_start();
include_once 'top.inc.php';

if( isset($_SESSION['user'])!="" ){
    header("Location: index.php");
}

if(isset($_POST['loginBtn'])) {
		
    $email = $conn->escape_string($_POST['email']);
    $pwd = $conn->escape_string($_POST['pwd']);
   
    $newUser = new User($email, $pwd);
    $newUser->login();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Login page: Tweet_pro</title>
    <link rel="stylesheet" href="css/style.css" type="text/css" />
</head>
<body>

    <div id="login">
    <form id="login-form" action="login.php"method="post">
      	<div>
            <h2>Sign In.</h2>
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
        <hr />    
        <div class="action-element">
            <button type="submit" class="btn" name="loginBtn">Sign In</button>
        </div>    
        <hr />    
        <div class="action-element">
                <a href="register_form.php">Sign Up Here...</a>
        </div>    
    </form>
    </div>      
</body>
</html>            
            
<?php
    include_once 'foot.inc.php';
?>
            
            	
           
            
            
        
        
   
    	



