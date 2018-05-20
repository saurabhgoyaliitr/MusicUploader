<?php

// include "../connect_server.php";

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>

	<style type="text/css">
	.playlists{
		cursor: pointer;

	}
	</style>

	<script type="text/javascript">
	function getListItems(id)
	 {
   
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("display_songs").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET", "/musicmania/playlists/display_playlist.php?category=" + id, true);
        xmlhttp.send();
	 }

	</script>
</head>
<body>
	<?php
		$username=$_SESSION['mm_username'];
		$sql="SELECT DISTINCT category FROM songs WHERE uploader='$username' ORDER BY category";

		$result=$connect->query($sql);
		$n=$result->num_rows;
		if($result->num_rows>0)
		{
			echo("<table   id=\"playlists_table\" class=\"\" style=\"max-width:180px;\"cellspacing=\"10px\">");
			$i=0;
			while($row = $result->fetch_assoc() )
			{	
				
				echo("<tr ");
				// if($i%2==0)
				// echo(" style=\"background:rgba(69, 78, 79, 0.33);\"");
				echo(">");

				echo("<td class='playlists active' style=\" color:#3A56AF;\"  onclick='getListItems(this.id)' id=\"".$row['category']."\"><br>");
				if($row['category']=='')
					echo(" &nbsp &nbsp &nbsp  ▶ Default");
				else
				echo( " &nbsp &nbsp &nbsp &nbsp ▶ ".($row['category']));
				echo("</td>");
				echo("</tr>");
				$i++;

			}
			echo("</table>");
			
	 	}

	 	else
	 	{
	 		echo("<pre>No playlists to show</pre>");
	 	}
	 	if($n>3)
	 	{
	//  		$str='<script type="text/javascript">
	// document.getElementById(\'playlists\').style.overflowY="scroll";
	// 	</script>;'
	 		// echo("hi");
		$str='<script> document.getElementById("playlists").style.overflowY="scroll" ;</script>';
		echo($str);
	 	}



	?>

	
</body>
</html>