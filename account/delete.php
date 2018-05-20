    



    <?php

            // problem in code

            session_start();
require "../connect_server.php";

            // Check connectection
            if ($connect->connect_error) {
                die("Connection failed: " . $connect->connect_error);
            } 
                    // included code from db_connection.php 
    ?>


    <?php

        $song_name=$_GET['song_to_delete'];
        $username=$_SESSION['mm_username'];
        // echo($song_name."  ".$uploader);
        $sql1="SELECT * FROM songs WHERE song_name='$song_name'  AND uploader='$username' ";
       
        $result1=$connect->query($sql1);
       while( $row=$result1->fetch_assoc()){
        // echo($row['singer']."yhi");
         $category=$row['category'];
        if(!unlink($row['song_location']))
        {
            echo("error in deleting");
        }


    }



        $sql="DELETE FROM songs WHERE song_name='$song_name'  AND uploader='$username' LIMIT 1 " ;
        $result=$connect->query($sql);

        if(!$result)
        {
            echo("error");
        }



         $sql2="SELECT id FROM songs WHERE category='$category'  AND uploader='$username'";
         $result2=$connect->query($sql2);

         if(!($result2->num_rows>0))
         {
            if(rmdir("../users/".$username."/".$category))
            {
                echo(" delted ");
            }

            else
            {
                echo("ploblem in deleting ");
            }

         }

    ?>