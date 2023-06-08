<?php
  require_once "db.php";

   session_start();
   
  if (isset($_POST['product']) && isset($_POST['location']) ) {

    //clear the session so we don't have the array of values to show the single item instead
    // remove all session variables
      session_unset();

      // destroy the session
      session_destroy();
        
      $query = "SELECT * FROM vare WHERE vare_name = '{$_POST['product']}' LIMIT 1";
      $result = mysqli_query($conn, $query);
       
      if (mysqli_num_rows($result) > 0) {

        echo '<h4>'.'Results for  <span style="color:#00796b;">'.$_POST['product'].'</span> in'.'</h4>'.$_POST['location'];
        while ($res = mysqli_fetch_array($result)) {
          
          $shopQuery = "SELECT * FROM butikk INNER JOIN butikkvare on butikk.butikk_id=butikkvare.butikk_id WHERE butikkvare.vare_id = '".$res['vare_id']."' AND butikk.butikk_postkode = '".$_POST['location']."'  LIMIT 10";
          

          $shopsResult = mysqli_query($conn, $shopQuery);
          
          if (mysqli_num_rows($shopsResult) > 0) { 
                  echo '<ul>';
                while ($shopsRes = mysqli_fetch_array($shopsResult)) { 
                     echo "<li> <a href='#'>".$res['vare_name']." ".'-'." ".$shopsRes['butikk_name']."  </a></li>";
                    }
                    echo '</ul>';
           }else{
                echo '<br><br>Oops Varen ble ikke funnet';
              }
        
        }
      } else {
        echo "
        <div class='alert alert-danger mt-3 text-center' role='alert'>
          
          Oops Varen ble ikke funnet
        </div>
        ";
      }
    }else {
    // Get the results without considering the post code   
    $query = "SELECT * FROM vare WHERE vare_name = '{$_POST['product']}' LIMIT 1";
          $result = mysqli_query($conn, $query);
          
          if (mysqli_num_rows($result) > 0) {

           
            // $_SESSION['user_id'] = $row['ID'];
            $values_array=array();
            


            echo '<h4>'.'Results for  <span style="color:#00796b;">'.$_POST['product'].'</span> in'.'</h4>';
            while ($res = mysqli_fetch_array($result)) {
              
            //  WHERE butikkvare.vare_id= $res['vare_id']
              $shopQuery = "SELECT * FROM butikk INNER JOIN butikkvare on butikk.butikk_id=butikkvare.butikk_id WHERE butikkvare.vare_id = '".$res['vare_id']."'  LIMIT 10";
              
            // echo the query here 
            // echo('<script>alert("'.$shopQuery.'")</script>');

              $shopsResult = mysqli_query($conn, $shopQuery);
              
              if (mysqli_num_rows($shopsResult) > 0) { 
                      echo '<ul>';
                    while ($shopsRes = mysqli_fetch_array($shopsResult)) { 
                        //push the row into the session array
                        array_push($values_array,"<li>".$res['vare_name']." ".'-'." ".$shopsRes['butikk_name']."</li>" );
                        echo "<li> <a href='#'>".$res['vare_name']." ".'-'." ".$shopsRes['butikk_name']."  </a></li>";
                        }
                        echo '</ul>';
                        
                        $_SESSION['values_array'] = $values_array;

              }else{
                echo '<br><br>Oops Varen ble ikke funnet';
              }
            
            }
          } else {
            echo "
            <div class='alert alert-danger mt-3 text-center' role='alert'>
              
              Oops Varen ble ikke funnet
            </div>
            ";
          }
        }
   
    ?>



<!-- /AND butikk.butikk_postkode = '".$_POST['location']."' -->
<!-- echo "<li> <a href='#'>".$res['vare_name']." ".'-'." ".$shopsRes['butikk_name']."  ".'-'."  ".$res['vare_styrke_enhet']."  ".'-'."  ".$res['vare_antall']."</a></li>"; -->


<!-- SELECT * FROM butikk INNER JOIN butikkvare on butikk.butikk_id=butikkvare.butikk_id WHERE butikkvare.vare_id = 81251 AND butikk.butikk_postkode = 1091  LIMIT 10 -->