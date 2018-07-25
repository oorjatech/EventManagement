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
        <h2>New User Registration</h2>
 </div>
        <form method="post" action="register.php">
            <!-- validation Error here-->
                <?php include('errors.php'); ?>

             <div class="input-group">
              <!--   <label>UserName:</label> -->
                <input type="text" name="username"  placeholder="Enter username" value="<?php echo $username; ?>">
            </div>
             <div class="input-group">
              <!--   <label>Email:</label> -->
                <input type="text" name="email"  placeholder="Enter email" value="<?php echo $email;?>">
            </div>
             <div class="input-group">
              <!--   <label>Password:</label> -->
             
                <input type="password" name="password_1" placeholder="Enter password" " >
               
          
            </div>
            <p> <input type="checkbox"  
                id="pwcheck"  
                onclick ="if (password_1.type == 'text') 
                password_1.type = 'password'; 
                else 
                password_1.type = 'text';"  
                />&nbsp Show 
            </p>
             <div class="input-group">
               <!--  <label>Confirm Password:</label> -->
            <input type="password" name="password_2" placeholder="Enter confirm password" ">
            </div>
             <div class="input-group">
             
                <button type="submit" name="register" class="btn" >Register</button> 
              
                
                <button type="reset" name="reset" class="btn" >Clear</button> 
            </div>
            <p>
                Already a member ?  <a href="login.php">Sign In</a>
            </p>
           
        </form>
   
    </body>
</html>
