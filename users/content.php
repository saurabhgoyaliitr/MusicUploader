<?php

// require "connect_server.php";

?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <style type="text/css">


.button {
    background-color: #5bc0de; /* Green */
    border: none;
    color: white;
    padding: 10px 15px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 14px;
    border-radius: 4px;
    margin: 4px 2px;
    //cursor: pointer;
}


	</style>

	<script type="text/javascript">

	</script>
</head>
<body>
	   
<!-- <div id="txtHint">h</div> -->

       <div id="songs_div">
	  <?php
	  	$n=0;
	  	$username=$_SESSION['mm_username'];
	  	$sql="SELECT * FROM songs WHERE uploader ='$username' ORDER BY views DESC";
	  	$result=$connect->query($sql);
echo("<table style=\"width:100%;\">");
		$n=$result->num_rows;
		$m=4;
	  	if($result->num_rows>0)
	  	{
	  		while($row=$result->fetch_assoc() )
	  		{
	  			if($m<=0)
	  				break;
	  			$m--;

	  		$sub=substr($row["song_location"],3,strlen($row["song_location"])-3);
	  		// echo("<table>");
	  		//   echo("<tr><td>");
	  		

	  		
	  		  echo("<tr>");
	  		   echo("<td>");
		  			
		  			echo ("<video  style=\"margin-top:10px;margin-bottom:10px;background:black;\" width=\"350\" height=\"240\" onclick='play_song(this) ; inc(this.src)' controls onloadstart='ahead_start(this)'  src=\"");
					echo($sub);
					echo("\"");
		  			echo("&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp");
		  		 	echo("</a>");
		  		  
	  		   echo("</td>");

	  		   echo ("<td style=\"text-align:right\">");
	  		   		echo($row["song_name"]."<br><br>");
	  		   		echo($row["song_link"]."<br><br>");

	  		   		echo("<a href=\"");
	  		   		echo($sub);
	  		   		echo("\" download>");
	  		   		echo("<button class=\"button\">Download</button>");
	  		   		echo("</a>");
	  		   echo ("</td>");

	  		  echo("</tr>");




	  		 	 // echo("</a>");
	  		  //	echo($row["song_name"]);
	  		//   echo("</td></tr>");
	  		// echo("</table>");
	  		}
	  	}	  		echo("</table>");

	  	// if($n>0)
	  	// {
	  	// 	echo("<button>load more</button>");
	  	// }
	  ?>
	  </div>
    
</body>
</html>