<?php include('server.php'); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>User Registration system using PHP and MySQL</title>
        <link rel="stylesheet" type="text/css" href="style.css"></link>

    </head>
    <body>
    <div class="header">
        <h2>Reset Password</h2>
 </div>
        <form method="post" action="forgotpassword.php">
             <?php include('errors.php'); ?>
            <div class="input-group">
             
                <input type="text" name="usernameforresetpassword" placeholder="Enter username">
            </div>
            
          <div class="input-group">
             
                <input type="password" name="newpassword" placeholder="Enter new password">
            </div>
            
             <div class="input-group">
             
                <button type="submit" name="submit" class="btn" >Submit</button> 
               <button type="submit" name="back" class="btn" >Back to Login</button> 
            </div>
          
        </form>
   
    </body>
</html>
