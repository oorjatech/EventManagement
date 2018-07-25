<?php include('server.php'); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Event Management System</title>
        <link rel="stylesheet" type="text/css" href="style.css"></link>

    </head>
    <body>
    <div class="header">
        <h2>Admin Panel</h2>
 </div>
        <form method="post" action="admin.php">
            <div class="list">
           <a href="addnewevent.php">Create New Event </a>
           </div>
            <div class="list">
           <a href="manageevents.php">Manage Events</a>
            </div>
        </form>
   
    </body>
</html>
