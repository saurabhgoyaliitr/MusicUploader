<?php
	session_start();
	
include "../connect_server.php";
	// Check connectection
	if ($connect->connect_error) {
	    die("Connection failed: " . $connect->connect_error);
	} 
			// included code from db_connection.php 


//if(isset($_POST['fileToUpload']))
{	
	$target_dir="profile_uploads";
	if(file_exists($target_dir));
	else
	{
		mkdir($target_dir);
	}
	$target_dir=$target_dir."/";
	

	$target_file = $target_dir . $_SESSION['mm_username'].".";
	$uploadOk = 1;
	$message="";
	$fileType=pathinfo(basename($_FILES["fileToUpload"]["name"]),PATHINFO_EXTENSION);
	$fileType=strtolower($fileType);

	// echo($fileType);

	if($fileType!="jpg" && $fileType!="jpeg" && $fileType!="png")
	{
		$uploadOk=0;
		$message="not a valid file type";
		// echo($fileType);
	}
	$delete_file=$target_file;
	$target_file.=$fileType;
	if($uploadOk==0)
	{
		// echo ($message."<br> ".$fileType);
	}

	else
	{
		// echo($delete_file."jpg");
		if(file_exists($delete_file."jpg"))
		{
			// echo($delete_file."jpg");
			unlink($delete_file."jpg");
		}

		if(file_exists($delete_file."jpeg"))
		{
			unlink($delete_file."jpeg");
		}


		if(file_exists($delete_file."png"))
		{
			// echo($delete_file."jpg");
			unlink($delete_file."png");
		}

		if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file))
		{	
			$message="The image ".basename($_FILES["fileToUpload"]["name"])." has been uploaded ";
		}

		else
		{
			$message="Error while uploading song ";
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
	// function update_database($song_link,$target_file,$connect)
	// {
	// 	$username=$_SESSION['mm_username'];
	// 	$song_name="";
	// 	$singer="";
	// 	if(isset($_POST['song_name']) && !empty($_POST['song_name']))
	// 	{
	// 		$song_name=$_POST['song_name'];
	// //		echo($song_name."<br>");
	// 	}
		
	// 	if(isset($_POST['song_name']) && !empty($_POST['song_name']))
	// 	{
	// 		$singer=$_POST['singer'];
	// 				// echo($song_name."<br>");
	// 	}

	// 	$check_duplicate="SELECT id FROM songs WHERE song_location='$target_file'";
	// 	$sql_query=$connect->query($check_duplicate);
	// 	//echo($target_file);
	// 	if($sql_query->num_rows>0)
	// 	{
	// 		echo ("You have already uploaded this song");
	// 	}

	// 	else
	// 	{
	// 		$sql="INSERT INTO songs (uploader,song_name,song_location,song_link,singer) VALUES ('".mysql_real_escape_string($username)."','".mysql_real_escape_string($song_name)."','".mysql_real_escape_string($target_file)."','".mysql_real_escape_string($song_link)."','".mysql_real_escape_string($singer)."') ";

	// 		$sql_query=$connect->query($sql);

	// 		if($sql_query)
	// 		{
	// 			echo("Successfully uploaded song");
	// 		}

	// 		else
	// 		{
	// 			echo("Error while updating database ");
	// 		}
	// 	}

	// }

?>

<head>
	<meta http-equiv="refresh" content="0; URL='../index.php'" />

</head>