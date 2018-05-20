<?php
	

session_start();
require "../connect_server.php";

// Check connectection
if ($connect->connect_error) 
{
    die("Connection failed: " . $connect->connect_error);
} 
        // included code from db_connection.php 

    $signup_message="";




    if($_SERVER['REQUEST_METHOD']=='GET')              // check if method request is POST
    {
          
            //echo("signup_FORM");
                      // call _isset and _empty to check if all the input fields are filled and set
              {
                
                 
                     {
                     
                     	$song_location1=$_GET['loc'];
                     	$song_location="null";
                     	$len=mb_strlen($song_location1,'UTF-8');
                     	echo($len);
                     	for($i=0;$i<$len;$i++)
                     	{

                     		if($song_location1[$i]=='u')
                     		{
                     			$sub=substr($song_location1, $i,5);
                     			
                     			// echo($sub." fuvk ");
                     				if($sub=="users")
                     				{	
                     					$song_location="../";
                     					$song_location.=substr($song_location1, $i,$len-$i);
                     				}
                     			
                     		}
                     	}

                     	

                     	echo($song_location);
                     
                    if(!isset($_SESSION[$song_location]))
                    {
                    	

                     	
                     	

     					$sql="SELECT views FROM songs WHERE song_location='$song_location'";
     					$result=$connect->query($sql);
     					$views=0;
     					if($result->num_rows>0)
     					{
     						while($row=$result->fetch_assoc())
							{
								$views=$row['views'];
							}
     					}
     					// echo($views);
     					$views=$views+1;
     						// echo($song_location."  ".$views);
     						
                        $check_duplicate="UPDATE songs SET views='$views' WHERE song_location='$song_location'";
                        $run_query=$connect->query($check_duplicate);

                        if($run_query)
                        {
                        	$_SESSION[$song_location]="1";
                            $signup_message="Username  already exists";
                                // echo($song_location."  ".$views);
                            
                        }


                        else
                        {
                            // echo("fuck");
                        }

                     }
                   }


              }

            //  echo $signup_message;

    }

	
?>