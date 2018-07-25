<?php include('server.php'); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>User Login</title>
        <link rel="stylesheet" type="text/css" href="style.css"></link>

    </head>
    <body>
    <div class="header">
        <h2>User Login</h2>
 </div>
        <form method="post" action="login.php">
            <?php error_reporting (E_ALL ^ E_NOTICE); ?>
            <?php 
            if ($_GET['msg'])
            {
                echo '<div class="success_message">' . base64_decode(urldecode($_GET['msg'])) . '</div>';
            } ?>
             <?php include('errors.php'); ?>
            <div class="input-group">
               <!--  <label>UserName:*</label> -->
                <input type="text" name="username" placeholder="Enter username">
            </div>
            
             <div class="input-group">
               <!--  <label>Password:*</label> -->
                <input type="password" name="password" placeholder="Enter password">

            </div>
            
             <div class="input-group">
             
                <button type="submit" name="login" class="btn" >Login</button> 
                 <button type="submit" name="forgotpassword" class="btn" >Forgot your Password</button> 
            </div>
            <p>
                Not yet a member ?  <a href="register.php">Sign Up</a>
            </p>
        </form>
   
    </body>
</html>
