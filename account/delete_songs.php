                              

        <?php

            session_start();
require "../connect_server.php";

            // Check connectection
            if ($connect->connect_error) {
                die("Connection failed: " . $connect->connect_error);
            } 
                    // included code from db_connection.php 
        ?>



                      <?php
                                $username=$_SESSION['mm_username'];
                                $category=$_REQUEST['song_to_delete'];
                                $username = mysqli_real_escape_string($connect,$username);
                                $category = mysqli_real_escape_string($connect,$category);
                                $sql="SELECT song_name, category FROM songs WHERE uploader='$username' AND category='$category' ORDER BY song_name";
                                $result=$connect->query($sql);
                            $i=0;

                              $n=$result->num_rows;
                                while($row=$result->fetch_assoc())
                                {
                                  $i++;
                                    echo("<tr ");
                                    if($i%2==1)
                                    {
                                      echo("style=\"background:gray\"");
                                    }
                                    else
                                    {
                                     echo("style=\"background:#ccc\"");
                                    }
                                      echo(">");
                                        
                                       echo("<td style=\"text-align:center;color:black\">");
                                       echo(strtoupper($row['song_name'])." ( ".strtoupper($row['category'])." ) ");
                                       echo("</td>");
                                       echo("<td> <button class=\"button\" onclick=\"delete_song(");
                                        echo("'".$row['song_name']."'");
                                        echo("); load_playlist()\" >delete</button></td>");
                                      
                                    
                                     echo("</tr>");

                                }

                            if($i==0)
                            {
                              echo(" <pre >        No such playlist exists </pre>");
                            }

                           

                               
                      ?>