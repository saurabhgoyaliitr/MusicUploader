
<?php
 // need to modify this function
        // need to modify this function
        // need to modify this function
        // need to modify this function
        // need to modify this function
        // need to modify this function
        // need to modify this function
        // need to modify this function
        // need to modify this function
        // need to modify this function
        // need to modify this function
        // need to modify this function
        // need to modify this function
        // need to modify this function
        

    
require "../connect_server.php";
    // Check connectection
    if ($connect->connect_error) {
        die("Connection failed: " . $connect->connect_error);
    } 
            // included code from db_connection.php 
?>


<?php
	session_start();
	if(!isset($_SESSION['mm_username']))
	{
		 echo("<head>");
        echo(" <meta http-equiv=\"refresh\" content=\"0; URL='../login_signup.php'\" />");
        echo("</head>");
        die("");
	}
?>

<!DOCTYPE html>

<html>
<head>
	<title></title>
	
        <!-- <link rel="stylesheet" type="text/css" href="index.css"> -->

        
            <!-- Latest compiled and minified CSS -->
                  <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
        <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="../bootstrap/jquery-2.1.3.min.js"></script>

        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
                
        <link rel="stylesheet" type="text/css" href="../index.css">
        <!-- <link rel="stylesheet" type="text/css" href="../css/index.css"> -->
        <link rel="stylesheet" type="text/css" href="../search_box/search_box.php">
        <link rel="stylesheet" type="text/css" href="../css/settings.css">
     	 <script src="http://maxcdn.
        bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <!-- jQuery library -->
        <!-- <link rel="stylesheet" type="text/css" href="../css/index.css"> -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <script type="text/javascript" src="../js/index.js"></script>
        <script type="text/javascript">

        // need to modify this function
        // need to modify this function
        // need to modify this function
        // need to modify this function
        // need to modify this function
        // need to modify this function
        // need to modify this function
        // need to modify this function
        // need to modify this function
        // need to modify this function
        // need to modify this function
        // need to modify this function
        // need to modify this function
        // need to modify this function

        function delete_song(song_name)
        {
            var xmlhttp=new XMLHttpRequest();
            xmlhttp.onreadystatechange=function (){
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                // document.getElementById("display_songs").innerHTML = xmlhttp.responseText;
             }   
            };

            xmlhttp.open("GET","/musicmania/account/delete.php?song_to_delete="+song_name,true);
            xmlhttp.send();

          // location.reload();
        }

        
        function alertmess()
        {

            // alert("Song has been deleted successfully ");

            // location.reload();
            alert("hi");
            load_playlist();

        }


        function load_playlist()
        {
             var xmlhttp = new XMLHttpRequest();
              song_to_delete=document.getElementById('song_to_delete').value;
              xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("display_songs_list").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET", "/musicmania/account/delete_songs.php?song_to_delete="+song_to_delete , true);
        xmlhttp.send();
        }
        


        document.getElementById("body").addEventListener("load", function(event){
    event.preventDefault()
});

        // $(document).ready(function(){
        //  $("body").scroll(function(e){
        // e.preventDefault()
        //      });
        // });
      
        </script>

          <script type="text/javascript">
            toggle=1;
                  $(document).ready(function(){
                    $("#toggle_playlists1").click(function(){
                        if(toggle==1)
                         {
                            $("#playlists").slideDown("fast");
                            toggle=0;

                          }

                           else
                          {
                             $("#playlists").slideUp("fast");
                             toggle=1;
                          }
                    });
                });
        </script>
        
     
        <!-- Latest compiled JavaScript -->
</head>
<body onload="do_first()" id="body">

		   <div id="blur">
        
   			 </div>

	        <div id="upload_container_box">

	        <?php require "../uploads/upload_box.php" ;?>    
	    
	        </div>

                    <div class="container">
                        <div class="row profile">
						<div class="col-md-3" >
                    





             <div class="profile-sidebar" id="sidebar" style="min-height:619px">
                                    <!-- SIDEBAR USERPIC -->
                                    <div class="profile-userpic">

                                        <img align="middle" height="200px" width="200px" class="img-circle" src=<?php $src="../uploads/profile_uploads/".$_SESSION["mm_username"].".jpg";
                                        $file=file_exists($src);
                                        if(!$file)
                                        {
                                            $src="../uploads/profile_uploads/".$_SESSION["mm_username"].".png";
                                            $file=file_exists($src);
                                        }
                                        if($file)
                                        echo($src);
                                        else
                                        echo("http://localhost/musicmania/uploads/profile_uploads/icon-user-default.jpg")
                                        ?> class="img-responsive" alt="">
                                    </div>
                                    <!-- END SIDEBAR USERPIC -->
                                    <!-- SIDEBAR USER TITLE -->
                                    <div class="profile-usertitle">
                                        <div class="profile-usertitle-name">
                                            
                                            Welcome
                                        </div>
                                        <div class="profile-usertitle-job">
                                            <?php echo($_SESSION['mm_username']) ?>
                                        </div>
                                    </div>
                                    <!-- END SIDEBAR USER TITLE -->
                                    <!-- SIDEBAR BUTTONS -->
                                    <div class="profile-userbuttons">

                                    <form action="../login_signup/logout.php" method="POST">
                                        
                                            <!-- <button type="file" class="btn btn-success btn-sm">Change Profile</button> -->
                                            <input  type="submit" class="btn btn-danger btn-sm" value="Log out">
                                        </form>
                                    </div>
                                    <!-- END SIDEBAR BUTTONS -->
                                    <!-- SIDEBAR MENU -->
                                    <div class="profile-usermenu">
                                        <ul class="nav">
                                            <li class="active">
                                                <a href="../index.php">
                                                <i class="glyphicon glyphicon-home"></i>
                                                Home </a>
                                            </li>
                                            <li>
                                                <a href="../account/settings.php">
                                                <i class="glyphicon glyphicon-user"></i>
                                                Account Settings </a>
                                            </li>
                                            <li>
                                                <a onclick="show_upload_box()">
                                                <i class="glyphicon glyphicon-ok"></i>
                                                Upload songs </a>
                                            </li>
                                            <li>
                                                <a  id="toggle_playlists1" >
                                                <i class="glyphicon glyphicon-flag" ></i>
                                                My playlists </a>
                
                                            </li>


                                        </ul>

                                        <div id="playlists" style="height:110px;display:none" >
                                            <?php require "../playlists/playlists.php" ?>
                                        </div>

                                    </div>
                                    <!-- END MENU -->
                                </div>

                       </div>

                       	<div class="col-md-9" id="new_settings" onload="setHeight()" style="min-height:600;">
							<table cellpadding="10" style="margin:30px;" >
								<th id="th" style="text-align:left;padding-top:10;">Change Password </th>
							</table>
							<table id="pass_change_table" cellpadding="10" style="padding:10px;"> 
								
								<form method="POST" action="change_password.php">
									<tr>
										<td style="text-align:right">New password:</td> <td><input type="password" style="border-radius:5px;border: 2px solid rgba(26, 156, 186, 0.72)" name ="new_password"></td>
										
									</tr>

									<tr>
										<td style="text-align:right">Retype password:</td><td><input type="password" style="border-radius:5px;border: 2px solid rgba(26, 156, 186, 0.72)" name ="re_new_password"></td>
										
									</tr>

									<tr>
										<td style="text-align:right">
											Old password:</td><td><input type="password" style="border-radius:5px;border: 2px solid rgba(26, 156, 186, 0.72)" name="old_password"><br>
										</td>
									</tr>

									<tr>
										<td></td><td>
											<button class="button" type="submit">change</button></td>
										

									</tr>
								</form>
							</table>

                             <table cellpadding="10" style="margin-top:30px;padding-top:30px;">
                                <th id="th"  style="text-align:left;">Change Profile Picture</th>
                            </table>



                            <table cellpadding="10">
                            
                                <tr>
                                    
                                        <form action="../uploads/profile_upload.php" method="POST" enctype="multipart/form-data" >
                                        <td style="text-align:center"><input type="file" name="fileToUpload"></td>
                                        <td> <button class="button" type="submit">upload</button></td>
                                        </form>
                                    
                                </tr>
                            </table>




                            <table cellpadding="10" style="margin-top:30px;padding-top:30px;">
                                <th id="th"  style="text-align:left;">Delete song / playlist </th>
                            </table>


                            <table cellpadding="10" id="song_delete_table">
                                
                        <form onsubmit ="load_playlist();return false;">
                            <tr>    
                                <td style="text-align:center;" ><input type="text" id="song_to_delete" style="border-radius:5px;float:center;width:60%;border: 2px solid rgba(26, 156, 186, 0.72);" placeholder="search playlist  to delete song " required></td>
                                <td style="text-align:left"><button class="button2" > Search </button></button></td>
                            </tr>
                        </form>

                                         
                            </table>
                            <div style="max-height:200px;background:white" id="wrap">
                            <table id="display_songs_list" ></table>
                            </div>
							<br>
							<br>

						
	 		
                          </div>
                          </div>       
                 </div>
            </body>
</html>










