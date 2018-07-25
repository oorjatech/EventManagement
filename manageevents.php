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
        <h2>Manage Events</h2>
 </div>
        <form method="post" action="manageevents.php">
             
           <table border="2" class="table1">
            <thead>
                <tr>
               <th>Event ID</th>
                <th>Event Name</th>
               <th>Start Date</th>
                <th>End Date</th>
                 <th>Status</th>
              
           </tr>
           </thead>
           <tbody>
            <?php
           
            //Database connection
            $db=mysqli_connect('localhost','root','root','eventDB');
            $sqlgetalleventlist="SELECT * FROM event";
            $result=mysqli_query($db,$sqlgetalleventlist);
            if(mysqli_num_rows($result)>0)
            {
                 while($row = mysqli_fetch_array($result))
                    {   
                        echo '<tr>
                  
                    <td>'.$row['eventid'].'</td>
                    <td>'.$row['eventname'].'</td>
                    <td>'.$row['eventfromdate'].'</td>
                    <td>'.$row['eventtodate'].'</td>
                    <td>'.$row['eventstatus'].'</td>
                    </tr>';
            
                   

                   
                    }
             }
             else
            {
                echo "No Event Records found.";
             }
            ?>
          
           </tbody>
           </table>
        </form>
   
    </body>
</html>
