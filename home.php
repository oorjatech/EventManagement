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
        <h2>Home Page</h2>
 </div>
        <div class="content">
            <?php if (isset($_SESSION['success'])): ?>
                <div class="error success">
                    <h3>
                        <?php
                          echo $_SESSION['success'];
                          unset($_SESSION['success']);
                          ?>
                    </h3>
                    
                </div>
            <?php endif ?>
            <?php if(isset($_SESSION["username"])): ?>
                <p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
                
                  <p><?php echo "Time Zone:".date_default_timezone_set("Asia/Calcutta"); ?></p>
                <p><a href="home.php?logout='1'" style="color: red;">Logout</a></p>
                <?php
$dt = new DateTime();
echo $dt->format('Y-m-d H:i:s a');
?>

            <?php endif ?>

        </div>
   
    </body>
</html>
