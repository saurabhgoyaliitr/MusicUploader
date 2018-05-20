

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script type="text/javascript" src="../js/index.js"></script>
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
</head>
<body>

</body>
</html>
<div id="songs_div">

<?php
	$search=$_GET["search_box"];
	$sql_query="SELECT * FROM songs";
	$result=$connect->query($sql_query);
	
	$str_match= array();
	if($result->num_rows>0)
	{
		
			$str_match=search_db($result,$search,"song_name");
		//	$str_match_singer=search_db($result,$search,"singer");
		
	}

	$s2=strlen($search);

	arsort($str_match);
	
	
	$count=0;
	foreach ($str_match as $key => $value) {
		
		if($count>=5 || $value<($s2)/2)
			break;
			
	  	$sql="SELECT DISTINCT song_location,song_name,song_link FROM songs WHERE song_location ='$key'";
	  	$result=$connect->query($sql);
	  	if($result->num_rows>0)
	  	{
	  		echo("<table style=\"width:100%\" >");

			while($row =$result->fetch_assoc())
			{
				display_video($row);
			}

			echo("</table>");
		}
			;

		$count++;

	}


	function display_video($row)
	{
		$sub=substr($row["song_location"],3,strlen($row["song_location"])-3);
			
	  		  echo("<tr>");
	  		   echo("<td>");
		  			
		  			echo ("<video style=\"margin-top:10px;margin-bottom:10px;background:black;\" width=\"350\" height=\"240\" onclick='play_song(this);inc(this.src)' controls onloadstart='ahead_start(this)' src=\"");
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
	  		
	}


	function search_db($result,$search,$song_name)
	{
		$str_match = array();
		while($song_array=$result->fetch_assoc())
		{
			$ans=0;
			$s2=strlen($search);
			
			$song_name="song_link";
			$song=strtolower($song_array[$song_name]);
			$song_location="";
			$song_location_db="song_location";
			$song_location=$song_array["song_location"];
			$size=strlen($song);
			$search=strtolower($search);
			// echo("song ".$song." ".($size-$s2)."  <br>");
			for( $i=0;$i<=($size-$s2);$i++)
			{
				$ans2=0;
				// echo("i ".$i." <br>");
				for($j=0;$j<$s2;$j++)
				{
					// echo("j ".$j." <br>");
					$k=$j;				
					$ans3=0;
					while($k<$s2  && $song[$i+$k]==$search[$k]  )
					{
					
						$ans3++;
						$k=$k+1;
						// echo("ans2 ".$ans2."<br> ");
					}

					if($ans3>$ans2)
					{
						$ans2=$ans3;
					}
				}

				if($ans2>$ans)
				{
					$ans=$ans2;
				}
			}

			
			$str_match+=array($song_location=>$ans);
			  // echo(" ans ".$ans." location ".$song_location."<br>");

		}

		return $str_match;
		
	}

?>


