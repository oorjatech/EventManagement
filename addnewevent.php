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
        <h2>Add New Event</h2>
 </div>
        <form method="post" action="addnewevent.php">
            <!-- validation Error here-->

                <?php include('errors.php'); ?>

                  <label>Please fill these details to create new event :</label>
                  

             <div class="input-group">
                <label> Name: *</label>
                <input type="text" name="eventname"  placeholder="Enter eventname" value="<?php echo $eventname; ?>">
            </div>
             <div class="input-group">
                  <label> Location: *</label>
                   <select name="eventlocation">
              <option value="Delhi">Delhi</option>
              <option value="Mumbai">Mumbai</option>
               <option value="Pune">Pune</option>
              <option value="Kolkata">Kolkata</option>
               <option value="Banglore">Banglore</option>
              <option value="Chennai">Chennai</option>
               <option value="Goa">Goa</option>
              
              </select>
               <!--  <input type="text" name="eventlocation"  placeholder="Enter location" "> -->
            </div>
             <div class="input-group">
               <label> Venue: *</label>
             
            <textarea rows="4" name="eventvenue" id="textarea1" style="width: 550px; height: 60px;"
             >
             
                 
              </textarea>
               
          
            </div>
            
            
             <div >
            
             <label>From Date:*</label>
           <input type="date" name="eventfromdate" value="<?php echo $eventfromdate; ?>" class="fromdate">
            </div>
            <div >
            
             <label>To Date:*</label>
           <input type="date" name="eventtodate" value="<?php echo $eventtodate; ?>" class="fromdate">
            </div>
            <div >
            
             
             </div>
             <div>
              <label>Time :*</label>
              <div >
           
                <input type="text" name="eventfromtime"  placeholder="Enter from time" value="<?php echo $eventfromtime; ?>">
                <select name="time1">
              <option value="AM">AM</option>
              <option value="PM">PM</option>
              </select>

            </div>
            <!--   <input type="text" name="eventfromtime" value="<?php echo $eventfromtime; ?>"> -->
               
             
              <input type="text" name="eventtotime" placeholder="Enter to time" value="<?php echo $eventtotime; ?>">
                <select name="time2">
              <option value="AM">AM</option>
              <option value="PM">PM</option>
              </select>
             </div>
                <label> Event Status: *</label>
              <div >
             
                <input type="radio" name="eventstatus" value="Active" <?php if (isset($_POST['eventstatus']) && $_POST['eventstatus']=="Active") echo "checked";?>>Active<br>
                <input type="radio" name="eventstatus" value="Inactive" <?php if (isset($_POST['eventstatus']) && $_POST['eventstatus']=="Inactive") echo "checked";?> >Inactive
            </div>
          
             <div class="input-group">
             
                <button type="submit" name="addevent" class="btn" >Create</button> 
              
                
                <button type="reset" name="reset" class="btn" >Clear</button> 
            </div>
          
           
        </form>
   
    </body>
</html>
