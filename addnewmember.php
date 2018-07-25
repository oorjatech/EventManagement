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
        <h2>New Member Registration Form</h2>
 </div>
        <form method="post" action="addnewmember.php">
            <!-- validation Error here-->

                  <?php include('errors.php'); ?>
                  

                  <label><b>Please fill in the form below.</b></label>
                  <!-- <?php
                   //$db=mysqli_connect('localhost','root','root','eventDB');
                  ?> -->
                  <div class="input-group">
                      <label>Select Event: *</label>
                      <select name="eventlist">
                         <option value=""> -----------ALL----------- </option> 
                        <!-- <?php
                         //$sqleventlist=mysqli_query($db,"Select eventid,eventname from event");
                         // while($row=mysqli_fetch_row($sqleventlist))
                              { 
                             // echo "<option value='$row[0]'> $row[1] </option>";
                              }
                          ?> -->
                    
                    <?php
                      while(!empty($eventnamelist))
                              { 
                                $eventname=array_pop($eventnamelist);
                              echo "<option value='$eventname'> $eventname </option>";
                              }

                    ?>

                        
                      </select>
                  </div>
                  <div class="your-class">
                    <label>Name: *</label>
                  
                    <div>
                      <input type="text" name="firstname" style="margin-right:5px" placeholder="First Name"   value="<?php echo $firstname; ?>">
                      <input type="text" name="lastname"   style="margin-left: :5px" placeholder="Last Name"   value="<?php echo $lastname; ?>">
                    </div>
                  </div>

                 


             <div class="input-group">
                <label> Mobile : *</label>
                <input type="text" name="mobile"  placeholder="Mobile Number" value="<?php echo $mobile; ?>">
            </div>
             <div class="input-group">
                <label> Email: *</label>
                <input type="text" name="email"  placeholder="Email "  value="<?php echo $email; ?>">
            </div>
             </div>
             <div class="input-group">
                <label> Organization Name : *</label>
                <input type="text" name="organization"  placeholder="Organization Name"  value="<?php echo $organization; ?>">
            </div>
            <div class="input-group">
                <label> Designation : *</label>
                <input type="text" name="designation"  placeholder="Designation "  value="<?php echo $designation; ?>">
            </div>
            <div class="input-group">
             
                <button type="submit" name="addmember" class="btn" >Submit</button> 
              
                
                <button type="reset" name="reset" class="btn" >Clear</button> 
            </div>
          
           
        </form>
   
    </body>
</html>
