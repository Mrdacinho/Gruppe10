<?php
  require_once "db.php";

  $query = "SELECT vare_id,vare_name FROM vare LIMIT 10";
  $result = mysqli_query($conn, $query);

  if (mysqli_num_rows($result) > 0) {
        while ($res = mysqli_fetch_array($result)) {
          
          echo '<ul class="results">';
          // echo $res['vare_name']. "<br/>";
          echo "<li> <a href='#'>".$res['vare_name']."</a></li>";
          echo '</ul>';
          
        }
      } else {
        echo "
        <div class='alert alert-danger mt-3 text-center' role='alert'>
        Record not found
        </div>
        ";
      }



?>