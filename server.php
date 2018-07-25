<?php 
 
session_start();
$eventid="";
$eventname="";
$eventfromtime="";
$eventtotime="";
$errors=array();
$eventnamelist=array();
$eventfromdate="";
$eventtodate="";
$firstname="";
$lastname="";
$mobile="";
$email="";
$organization="";
$designation="";



//Database connection
$db=mysqli_connect('localhost','root','root','eventDB');

//if create button clicked

if(isset($_POST['addevent']))
{
	//$eventid=mysqli_real_escape_string($db,$_POST['eventid']);
	$eventname=mysqli_real_escape_string($db,$_POST['eventname']);
	$eventlocation=mysqli_real_escape_string($db,$_POST['eventlocation']);
	$eventvenue=mysqli_real_escape_string($db,$_POST['eventvenue']);
	$eventfromdate=mysqli_real_escape_string($db,$_POST['eventfromdate']);
	$eventtodate=mysqli_real_escape_string($db,$_POST['eventtodate']);
	$eventfromtime=mysqli_real_escape_string($db,$_POST['eventfromtime']);
	$eventtotime=mysqli_real_escape_string($db,$_POST['eventtotime']);
	$totimestamp=mysqli_real_escape_string($db,$_POST['time1']);
	$fromtimestamp=mysqli_real_escape_string($db,$_POST['time2']);
	 $venue = trim($_POST["eventvenue"]);
	 



	//verify that form fields are filled
	//if(empty($eventid))
	//{
	//	array_push($errors, "Event Id is required");
	//}
	//else 
	if(empty($eventname))
	{
		array_push($errors, "Event name is required");
	}

	else if(empty($eventlocation))
	{
		array_push($errors, "Event location is required");
	}
	
	else if($venue=="")
	{
		array_push($errors, "Event venue is required");
	}
	else if(empty($eventfromdate))
	{
		array_push($errors, "Event from date is required");
	}
	else if(empty($eventtodate))
	{
		array_push($errors, "Event to date is required");
	}
	else if(empty($eventfromtime))
	{
		array_push($errors, "Event from time is required");
	}
	else if(empty($eventtotime))
	{
		array_push($errors, "Event to time is required");
	}

	
	//add event to DB
	if(count($errors) == 0)
	{
		$sqlcheckduplicate="SELECT eventid FROM event WHERE eventid='$eventid'";
		$duplicate=mysqli_query($db,$sqlcheckduplicate);
		if(mysqli_num_rows($duplicate)==1)
		{
			echo "This event is already exist,Please enter other event ID";
			// echo "<script>
			// 	alert('This event is already exist,Please enter other event ID');

			// </script>";

		}
		else
		{
		$sqladdnewevent="INSERT INTO event(eventname,eventlocation,eventvenue,eventfromdate,eventtodate,eventfromtime,eventtotime) VALUES('$eventname','$eventlocation','$eventvenue','$eventfromdate','$eventtodate','$eventfromtime','$eventtotime')";
		$result=mysqli_query($db,$sqladdnewevent);
		if(!$result){
  		
   			}
   			else
   			{
   				$eventid='';
   				echo "New Event added Successfully!!!" ;
   				header('location:admin.php');  //redirected to home page

   			}
   		}		
	}
}


//if add member button clicked

if(isset($_POST['addmember']))
{
	$firstname=mysqli_real_escape_string($db,$_POST['firstname']);
	$lastname=mysqli_real_escape_string($db,$_POST['lastname']);
	$mobile=mysqli_real_escape_string($db,$_POST['mobile']);
	$email=mysqli_real_escape_string($db,$_POST['email']);
	$organization=mysqli_real_escape_string($db,$_POST['organization']);
	$designation=mysqli_real_escape_string($db,$_POST['designation']);
	$selectedeventname=mysqli_real_escape_string($db,$_POST['eventlist']);
	echo $selectedeventname;



	//verify that form fields are filled
	if(empty($firstname))
	{
		array_push($errors, "First Name required");
	}
	else if(empty($lastname))
	{
		array_push($errors, "Last name required");
	}

	else if(empty($mobile))
	{
		array_push($errors, "Mobile number required");
	}
	
	else if(empty($email))
	{
		array_push($errors, "Email address required");
	}
	else if(empty($organization))
	{
		array_push($errors, "Organization name required");
	}
	else if(empty($designation))
	{
		array_push($errors, "Designation required");
	}
	

	
	//add event to DB
	if(count($errors) == 0)
	{
		$sqlcheckduplicate="SELECT mobilenumber FROM member WHERE mobilenumber='$mobile'";
		$duplicateMobile=mysqli_query($db,$sqlcheckduplicate);
		if(mysqli_num_rows($duplicateMobile)==1)
		{
			array_push($errors, "This Mobile is already exist,Please enter other Mobile Number");
			//echo "This Mobile is already exist,Please enter other Mobile Number";
			// echo "<script>
			// 	alert('This event is already exist,Please enter other event ID');

			// </script>";

		}
		$sqlcheckduplicate="SELECT email FROM member WHERE email='$email'";
		$duplicateEmail=mysqli_query($db,$sqlcheckduplicate);
		if(mysqli_num_rows($duplicateEmail)==1)
		{
			array_push($errors, "This Email ID is already exist,Please enter other Email ID");
			//echo "This Email ID is already exist,Please enter other Email ID";
			// echo "<script>
			// 	alert('This event is already exist,Please enter other event ID');

			// </script>";

		}
		else
		{
		
		$sqlgeteventId="SELECT eventid FROM event WHERE eventname ='$selectedeventname'";
		$data=mysqli_query($db,$sqlgeteventId);
		if(mysqli_num_rows($data)>0)
		{
		while($row=mysqli_fetch_assoc($data) )
		{
			// $eventid=$row['eventid'];
			 $eventid=$row['eventid'];
			
			// $eventfromdate=$row['eventfromdate'];
			// $eventtodate=$row['eventtodate'];
			
			echo "Data:".$eventid;
		}
		}
	

		$sqladdnewmember="INSERT INTO member(eventid,firstname,lastname,mobilenumber,email,organization,designation) VALUES('$eventid','$firstname','$lastname','$mobile','$email','$organization','$designation')";
		$result=mysqli_query($db,$sqladdnewmember);
		if(!$result)
		{
  				echo "errors!!!" ;
  				error_reporting(E_ALL);
				ini_set('display_errors', 1);

   			}
   			else
   			{
   				$eventid='';
   				echo "New Member Registered Successfully!!!" ;
   				header('location:addnewmember.php');  //redirected to home page

   			}
   		}		
	}
}




//load event data from table and show to admin

	$sqlgetallevents="SELECT * FROM event WHERE eventstatus='Active'";
	$data=mysqli_query($db,$sqlgetallevents);
	if(mysqli_num_rows($data)>0)
	{
		while($row=mysqli_fetch_assoc($data) )
		{
			// $eventid=$row['eventid'];
			 $eventname=$row['eventname'];
			
			// $eventfromdate=$row['eventfromdate'];
			// $eventtodate=$row['eventtodate'];
			array_push($eventnamelist, $eventname);
			//echo "Data:".$eventname;
		}
	}
	



//user login via login page 
if(isset($_POST['login']))
{
	$username=mysqli_real_escape_string($db,$_POST['username']);
	$password=mysqli_real_escape_string($db,$_POST['password']);
	
	//verify that form fields are filled
	if(empty($username))
	{
		array_push($errors, "Username is required");
	}
	if(empty($password))
	{
		array_push($errors, "Password is required");
	}
	if(count($errors)==0)
	{
		$password=md5($password);
		echo "password:".$password;
		$sql="SELECT * FROM user WHERE username='$username' AND password='$password'";
		$result=mysqli_query($db,$sql);
		if(mysqli_num_rows($result)==1){
			//user login 
			$_SESSION['username']=$username;
   			$_SESSION['success']="You are now logged In";
   			header('location:home.php');  //redirected to home page
  		
   			}
   			else
   			{
   			array_push($errors,"Invalid User Credentials");
   			//header('location:login.php');
   			}

	}

}
// forgot password
if(isset($_POST['forgotpassword']))
{
	header('location:forgotpassword.php');  //redirected to forgot password page
}
if(isset($_POST['back']))
{
	header('location:login.php'); //redirected to login password page
}

//logout
if(isset($_GET['logout']))
{
	  session_destroy();
	  unset($_SESSION['username']);

	  header('location:login.php?msg='.urlencode(base64_encode("You have been Successfully logged out")));
	 
}
if(isset($_POST['submit']))
{
	$username=mysqli_real_escape_string($db,$_POST['usernameforresetpassword']);
	$password=mysqli_real_escape_string($db,$_POST['newpassword']);
	//verify that form fields are filled
	if(empty($username))
	{
		array_push($errors, "Username id  is required");
	}
	if(empty($password))
	{
		array_push($errors, "password id  is required");
	}
	if(count($errors)==0)
	{
	    
		//$sqlgetpassword="SELECT * FROM user WHERE email='$email'";
		$password=md5($password);
		$sqlupdatepassword="UPDATE user SET password='$password'  WHERE username='$username'";
		$result=mysqli_query($db,$sqlupdatepassword);

		
		if(!$result)
		{
			echo "Error: " . mysqli_error($db);  
		}
		else
		{
			echo "Your password is changed.please check it";
		}
	}	
}
	mysqli_close($db);
?>