<?php

session_start();
require "../connect_server.php";
// Check connectection
if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
} 



else
{

	$check_table_exists="SELECT 1 FROM signUp LIMIT 1";
	$table_exists=$connect->query($check_table_exists);
	if(!$table_exists)
	{
		$create_table="CREATE TABLE signUp (
				id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
				name VARCHAR(30) NOT NULL,
				username VARCHAR(30) NOT NULL,
				email VARCHAR(250),
				password VARCHAR(250),
				profile_pic VARCHAR(250)
				)";

		if(!$connect->query($create_table))
		{
			echo("SOME ERROR WHILE CREATING TABLE SIGNUP");	
		};
	}

	$check_table_exists="SELECT 1 FROM songs LIMIT 1";
	$table_exists=$connect->query($check_table_exists);
	if(!$table_exists)
	{
		$create_table="CREATE TABLE songs(
				id INT(6) UNSIGNED
					AUTO_INCREMENT PRIMARY KEY,
				uploader VARCHAR(250) NOT NULL,
				song_name VARCHAR(250) NOT NULL,
				song_link VARCHAR(250),
				singer VARCHAR(250),
				song_location VARCHAR(250),
				category VARCHAR(250),
				views INT
		)";

		if(!$connect->query($create_table))
		{
			echo("SOME ERROR WHILE CREATING TABLE SONGS");	
		};
	}
}


		// included code from db_connection.php 

	$signup_message="Not a POST request ";
	$correct="You have been successfully registered to this web site";


	if($_SERVER['REQUEST_METHOD']=='POST')    			// check if method request is POST
	{
			
			//echo("signup_FORM");
		if(_isset() && !_empty())						// call _isset and _empty to check if all the input fields are filled and set
		 	  {
		 	  	
												
				 	 $username=$_POST['username'];
				 	 $password1=md5($_POST['password']);
				 	 $password2=md5($_POST['confirm_password']);
				 	 //$password2=md5($_POST['password2']);

				 	 $email=$_POST['email'];
				 	 $name=$_POST['name'];
				 	 // $gender=htmlentities($_POST['gender'], ENT_QUOTES, "UTF-8");
				 	 // $country=htmlentities($_POST['country'], ENT_QUOTES, "UTF-8");
				 	 // $date_of_birth=$_POST['date_of_birth'];
				
				 	 // if($password1!=$password2)			// input passwords donot match
				 	 // {

				 	 // 	$signup_message="Password and confirm password did not match";
				 	 	
				 	 // }

				 	if($password1==$password2)
				 	 {
				 	 	$password=$password1;
				 	 	$check_duplicate="SELECT username FROM signUp WHERE username='$username'";
				 	 	$run_query=$connect->query($check_duplicate);

				 	 	if($run_query->num_rows>0)
				 	 	{
				 	 		$signup_message="Username ".$username." already exists";
				 	 		// die($signup_message);
				 	 		
				 	 	}


				 	 	else 						// call insert_user to insert user in database
				 	 	{	
				 	 		$signup_message= insert_user($name,$username,$password,$email,$connect,$signup_message);
				 	 		
				 	 	}

				 	 }

				 	 else
				 	 {
				 	 	$signup_message="password and confirmed password does not match";
				 	 }



		 	  }

		 	//  echo $signup_message;

		 	  if($signup_message!=$correct)
		 	  {
		 	  		
		 	  		 echo("<head>");
			        // echo($login_message);
			        echo(" <meta http-equiv=\"refresh\" content=\"0; URL=../signup.php?signup_error=" .$signup_message ."\" />");
			        echo("</head>");
		 	  }

		 	  else
		 	  {
  				echo(" <meta http-equiv=\"refresh\" content=\"0; URL=../index.php\" />");		 	
  			  }

	}





	////////////////////////////////////////////////////////////////////
	//// function _isset check if all the input fields are filled or not
	////////////////////////////////////////////////////////////////////

	function _isset()
	{
		 if(										
			 	(
			 	  isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password'])
						 && isset($_POST['name'])
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
			 	  !empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['password'])
			  	  && !empty($_POST['name']) 
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


	////////////////////////////////////////////////////////////////////
	// function to insert user into the database
	////////////////////////////////////////////////////////////////////

	function insert_user($name,$username,$password,$email,$connect,$signup_message)  				
	{		
		
		$sql="INSERT INTO signUp (name,username,email,password,profile_pic) VALUES 
	  	('".mysql_real_escape_string($name)."','".mysql_real_escape_string($username)."','".mysql_real_escape_string($email)."',
		'".mysql_real_escape_string($password)."','icon-user-default.png')";	
		
		if($connect->query($sql))
		{
			
			$_SESSION['mm_username']=$username;
			unset($_POST);
			return "You have been successfully registered to this web site";

		}

		else
		{
			// die("database insertion problem function insert_user");
			return "database insertion problem function insert_user";

		}
						 	 		
	}




?>

