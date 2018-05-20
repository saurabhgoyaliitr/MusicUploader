
<?php
    
session_start();
require "connect_server.php";
    if(!isset($_SESSION['mm_username']))
    {
        echo("<head>");
        // echo($login_message);
        $login_message="Please login to continue ";
        echo(" <meta http-equiv=\"refresh\" content=\"0; URL=login_signup.php?login_message=" .$login_message ."\" />");
        echo("</head>");
        die("");

    }
?>

<html>
    <head>
      <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="bootstrap/jquery-2.1.3.min.js"></script>

        
        <link rel="stylesheet" type="text/css" href="index.css">
         <link rel="stylesheet" type="text/css" href="../index.css">
           <link rel="stylesheet" type="text/css" href="css/index.css">
            <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
      <script src="http://maxcdn.
        bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <!-- jQuery library -->
        <!-- <link rel="stylesheet" type="text/css" href="../css/index.css"> -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <script type="text/javascript" src="../js/index.js"></script>
        <!-- Latest compiled JavaScript -->
        <script type="text/javascript" src="js/index.js"></script>

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
        

    </head>

    <body onload="do_first()">
       
        

        <div id="upload_container">

        <?php require "uploads/upload_box.php" ;?>    
    
        </div>
                                        <!--
                    User Profile Sidebar by @keenthemes
                    A component of Metronic Theme - #1 Selling Bootstrap 3 Admin Theme in Themeforest: http://j.mp/metronictheme
                    Licensed under MIT
                    -->

                    <div class="container">
                        <div class="row profile">
                            <div class="col-md-3" >
                                <div class="profile-sidebar" id="sidebar">
                                    <!-- SIDEBAR USERPIC -->
                                    <div class="profile-userpic">

                                        <img src=<?php $src="uploads/profile_uploads/".$_SESSION["mm_username"].".jpg";
                                        $file=file_exists($src);
                                        if(!$file)
                                            {  
                                              $src= "uploads/profile_uploads/".$_SESSION["mm_username"].".png"; 
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

                                    <form action="login_signup/logout.php" method="POST">
                                        
                                            <!-- <button type="file" class="btn btn-success btn-sm">Change Profile</button> -->
                                            <input  type="submit" class="btn btn-danger btn-sm" value="Log out">
                                        </form>
                                    </div>
                                    <!-- END SIDEBAR BUTTONS -->
                                    <!-- SIDEBAR MENU -->
                                    <div class="profile-usermenu">
                                        <ul class="nav">
                                            <li class="active">
                                                <a href="index.php">
                                                <i class="glyphicon glyphicon-home"></i>
                                                Home </a>
                                            </li>
                                            <li>
                                                <a href="account/settings.php">
                                                <i class="glyphicon glyphicon-user"></i>
                                                Account Settings </a>
                                            </li>
                                            <li>
                                                <a  onclick="show_upload_box()">
                                                <i class="glyphicon glyphicon-ok"></i>
                                                Upload songs </a>
                                            </li>
                                            <li>
                                                <a id="toggle_playlists1" >
                                                <i class="glyphicon glyphicon-flag" ></i>
                                                My playlists </a>
                                               
                                            </li>


                                        </ul>

                                        <div id="playlists" style="height:100px;display:none" >
                                            <?php require "playlists/playlists.php" ?>
                                        </div>

                                    </div>
                                    <!-- END MENU -->
                                </div>
                            </div>

                            <div class="col-md-9">


                                <div class="profile-content" id="content">
                                     
                                <div id="song_upload_alert" style="display:none" class="alert alert-danger">
                                    <p>
                                    <?php 
                                    if(isset($_REQUEST['song_upload_message']))
                                    {
                                        $str="<script>
                                        document.getElementById('song_upload_alert').style.display='block';
                                        </script>";
                                        echo($str);
                                        // echo($_REQUEST['song_upload_message']);
                                        echo($_REQUEST['song_upload_message']);
                                    }
                                    ?></p>
                                    <span></span>
                                </div>
                                       <div id="search_box">
                                          <?php require "search_box/search_box.php";?>
                                          
                                        </div>
                                <div id="display_songs">
                                    <?php 
                                    if(isset($_GET['search_box']) && !empty($_GET['search_box']))
                                    {
                                        require "search_box/search_songs.php";
                                    }
                                    else
                                    require "users/content.php";


                                    ?>
                                 </div>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                    <br>
                    <br>

                      <!--
                    User Profile Sidebar by @keenthemes
                    A component of Metronic Theme - #1 Selling Bootstrap 3 Admin Theme in Themeforest: http://j.mp/metronictheme
                    Licensed under MIT
                    -->
            
            
       
        <footer>
            
        </footer>

        </div>

    </body>
</html>


