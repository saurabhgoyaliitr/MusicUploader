<?php
	session_start();
require "../connect_server.php";
// Check connectection
if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
} 
		// included code from db_connection.php 


	if(_isset() && !_empty())
	{
		if($_POST['new_password']!=$_POST['re_new_password'])
		{
			echo("password and retyped password do not match");
				
			echo("<head>");
	        echo(" <meta http-equiv=\"refresh\" content=\"2; URL='settings.php'\" />");
	        echo("</head>");
	        die("");
		
		}

		else 
		{
			$username=$_SESSION['mm_username'];
			$password=md5($_POST["old_password"]);
			//echo($username."  ".$password);
			$sql="SELECT id from signUp WHERE username='$username' AND password='$password'";
			$result=$connect->query($sql);
			
			if($result->num_rows>0)
			{	//echo("reached");
				$new_password=$_POST["new_password"];
				change_password($username,$password,md5($new_password),$connect);
			}

			else
			{
				echo("Old password not correct");
						
				echo("<head>");
		        echo(" <meta http-equiv=\"refresh\" content=\"2; URL='settings.php'\" />");
		        echo("</head>");
		        die("");
		
			}

		
		}
	}



	function change_password($username,$password,$new_password,$connect)
	{
		$sql="UPDATE signUp SET password='$new_password'  WHERE username='$username' AND password='$password'";
		$result=$connect->query($sql);
		if(!$result)
		{
			echo($connect->error);
		}

		else

		{
			echo("password change successfully");
		}
	}
	
	function _isset()
	{
		 if(										
			 	(
			 	  isset($_POST['new_password']) && isset($_POST['re_new_password']) && isset($_POST['old_password'])
			  	)
		   )
		 {

		 	return true;
		 }

		 else{
		 	$GLOBALS['signup_message']="Fields are not set";
		 	return false;
		 }
			
	}

	////////////////////////////////////////////////////////////////////
	////// function _empty check if all the input fields are filled or not
	////////////////////////////////////////////////////////////////////

	function _empty()
	{
		  if(										
			 	(
			 	  !empty($_POST['new_password']) && !empty($_POST['re_new_password']) && !empty($_POST['old_password'])
			  	)
		   )
		 {

		 	return false;
		 }

		 else{
			$GLOBALS['signup_message']="Fields are not filled";
		 	
			return true;
		}
	}
?>



<head>
	<meta http-equiv="refresh" content="1; URL='../index.php'" />

</head>