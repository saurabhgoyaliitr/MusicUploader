<?php

// Check connectection

session_start();
require "../connect_server.php";

if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
} 


else
{

	$check_table_exists="SELECT 1 FROM signUp LIMIT 1";
	$table_exists=$connect->query($check_table_exists);
	if(!$table_exists)
	{
		$create_table="CREATE TABLE signUP (
				id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
				name VARCHAR(30) NOT NULL,
				username VARCHAR(30) NOT NULL,
				email VARCHAR(250) NOT NULL ,
				password VARCHAR(250) NOT NULL,
				profile_pic VARCHAR(250) NOT NULL
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

	$login_message="";


	if($_SERVER['REQUEST_METHOD']=='POST')    			// check if method request is POST
	{
			
		if(login_isset() && !login_empty())						// call _isset and _empty to check if all the input fields are filled and set
		 	  {
		 	  	
			//echo("login_FORM");
												
				 	 $username=$_POST['username'];
				 	 $password1=md5($_POST['password']);
				
				 	
				 	 {
				 	 	$password=$password1;
				 	 	$check_duplicate="SELECT username FROM signUp WHERE username='$username' AND password='$password'";
				 	 	$run_query=$connect->query($check_duplicate);

				 	 	if($run_query->num_rows>0)
				 	 	{
				 	 		$_SESSION['mm_username']=$username;
				 	 		$login_message="login successfully";
				 	 		// echo($login_message);
				 	 		unset($_POST);
				 	 		$str="<meta http-equiv=\"refresh\" content=\"0; URL=../index.php\">";

				 	 		// $str="<meta http-equiv=\"refresh\" content=\"0; URL=../index.php\">";
		 	  				echo($str);
				 	 		//echo($_POST['username']);
				 	 		
				 	 	}


				 	 	else 						// call insert_user to insert user in database
				 	 	{	
				 	 		$login_message="username or password not correct";
				 	 		// echo($login_message);
				 	 		$str="<meta http-equiv=\"refresh\" content=\"0; URL=../login_signup.php?login_message=".$login_message."\">";
				 	 		echo($str);

				 	 		// die($login_message);
				 	 		
				 	 	}

				 	 }



		 	  }

		 	  // echo $login_message;

		 	  // if($login_message!="login successfully")
		 	  // {
		 	  // 	$str="<meta http-equiv=\"refresh\" content=\"0; URL=../login_signup.php?login_message=\"".$login_message.">";
		 	  // 	// echo($str);
		 	  // }

		 	  // else
		 	  // {
		 	  // 	$str="<meta http-equiv=\"refresh\" content=\"0; URL=../index.php\">";
		 	  // }
	}

	////////////////////////////////////////////////////////////////////
	//// function _isset check if all the input fields are filled or not
	////////////////////////////////////////////////////////////////////

	function login_isset()
	{
		 if(										
			 	(
			 	  isset($_POST['username']) && isset($_POST['password'])
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

	function login_empty()
	{
		  if(										
			 	(
			 	  !empty($_POST['username']) && !empty($_POST['password'])
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


