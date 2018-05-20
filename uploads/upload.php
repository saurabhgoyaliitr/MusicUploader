<?php
	session_start();
	
	include "../connect_server.php";
	// Check connectection
	if ($connect->connect_error) {
	    die("Connection failed: " . $connect->connect_error);
	} 
			// included code from db_connection.php 

	$category="";

//if(isset($_POST['fileToUpload']))
{
	// if(isset($_POST['song_name']) && !empty($_POST['song_name']))
	{
		// echo( " cat ".$_POST['category']);
		$category=strtolower($_POST['category']);
		// echo( " cat ".$_POST['category']);
	
	}

	
	$target_dir = "../users/". $_SESSION['mm_username']."/";
	if(file_exists($target_dir));
	else
	{
		mkdir($target_dir);
	}


	

	$target_dir=$target_dir.$category."/";

	// echo($category." td ".$target_dir );

	if(file_exists($target_dir));
	else
	{
		mkdir($target_dir);
	}

	
	$song_name=basename($_FILES["fileToUpload"]["name"]);
	$target_file = $target_dir .$song_name;
	$uploadOk = 1;
	$message="";
	$fileType=pathinfo($target_file,PATHINFO_EXTENSION);
	$fileType=strtolower($fileType);
	echo($fileType);
	$target_file = $target_dir .$_POST['song_name'].".".$fileType;



	if($uploadOk==0)
	{
		// echo ($message."<br>");
	}

	else
	{

		 update_database($song_name,$target_file,$connect,$category);

		if($message!="You have already uploaded this song" &&  move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file))
		{	
			$message="The song ".basename($_FILES["fileToUpload"]["name"])." has been uploaded ";
			
		}

		else
		{
			$message="There is a problem while uploading song ";
		}
	}

	#############################################
	#############################################
	#############################################
	#############################################
	#############################################
	#############################################
	################ functions ##################
	#############################################
	#############################################

}
	function update_database($song_link,$target_file,$connect,$category)
	{
		$username=$_SESSION['mm_username'];
		$song_name="";
		$singer="";
		if(isset($_POST['song_name']) && !empty($_POST['song_name']))
		{
			$song_name=$_POST['song_name'];
	//		echo($song_name."<br>");
		}
		
		if(isset($_POST['song_name']) && !empty($_POST['song_name']))
		{
			$singer=$_POST['singer'];
					// echo($song_name."<br>");
		}

		$check_duplicate="SELECT id FROM songs WHERE song_location='$target_file'";
		$sql_query=$connect->query($check_duplicate);
		//echo($target_file);
		if($sql_query->num_rows>0)
		{
			$GLOBALS['$message']="You have already uploaded this song";
		}

		else
		{
			$sql="INSERT INTO songs (uploader,song_name,song_location,song_link,singer,category) VALUES ('".mysql_real_escape_string($username)."','".mysql_real_escape_string($song_name)."','".mysql_real_escape_string($target_file)."','".mysql_real_escape_string($song_link)."','".mysql_real_escape_string($singer)."','".mysql_real_escape_string($category)."') ";

			$sql_query=$connect->query($sql);

			if($sql_query)
			{
				// echo("Successfully uploaded song");
			}

			else
			{
				// echo("Error while updating database ");
			}
		}

	}

?>

<head>
	<meta http-equiv="refresh" content="0; URL=../index.php?" />

</head>