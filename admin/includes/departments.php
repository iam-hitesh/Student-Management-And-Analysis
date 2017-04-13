<?php
include 'include.php';
dbconnect();
    $session_sql = "SELECT DISTINCT session from strings";
    $session_query = mysqli_query($conn,$session_sql);

    $num_rows = mysqli_num_rows($session_query);
                                              
          if($session_query){
              if($num_rows > 0){
                   while($row = mysqli_fetch_array($session_query)){
                        echo "<option value=\"".$row['session']."\">".$row['session']."</option>";
                            }
                }
          }
?>