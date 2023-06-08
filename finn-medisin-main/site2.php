<?php  
    session_start();
?>
<!DOCTYPE html>
<html lang="no">
  <head>
    <meta charset="UTF-8" />
    <meta
      name="keywords"
      content="finn, medisin, legemiddel, legemiddelmangel, lagerstatus"
    />
    <meta
      name="description"
      content="Hjemmeside for å finne medisiner på norske apotek"
    />
    <meta
      name="author"
      content="Patrik Oskar Graff, Iselin Sannes Stridsklev, Almin Dacic, Joachim Nyland Andersen, Sindre Rødne"
    />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Hjemmeside</title>
    <link rel="stylesheet" type="text/css" href="css/header.css" />
    <link rel="stylesheet" type="text/css" href="css/site2.css" />

    <link
      rel="icon"
      type="image/x-icon"
      href="../BOP3000/Logo/fm_favicon.ico"
    />
    <link
      id=""
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i"
    />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
     <!-- <script>
      let check_product = !!localStorage.getItem("product_string");
      if(check_product===false) window.location.href = 'index.php'
    </script> -->
  </head>
  <body>
    <?php include 'php/header.php';?>

    <section class="section1.2">
      <div class="sec1_2_placement_inner_i">
        <div class="sec1_2box1">
          <img src="Pictures/Medicine_icon-1.png" />
        </div>
        <div class="description">
          <!-- <p id="product">varenavn:  <br />Butikknavn:  <br />styrke: <br />mengde: </p> -->
        </div>
        <?php
       
            
            if(isset($_SESSION['values_array'])){

            echo '<div class="values-container"><h4>Resultater funnet...</h4><ul>';

                //loop through the values error
            $values = $_SESSION['values_array'];
                  
             foreach ($values as $key => $val) {
                        echo $val;
                      } 

            echo '</ul></div>';
            }
          
                  
          ?>

      </div>
    </section>

    <footer class="footer-style">
      <div class="footer_placement">
        <p>
          finnmedisin.no &copy; 2023<br />Nettsiden benytter
          <a href="">informasjonskapsler</a>
        </p>
      </div>
      <!-- <button>Til toppen</button> -->
    </footer>
    <script>
      if(localStorage.getItem("product_string").length > 0){

        let product = localStorage.getItem("product_string").split('-');
         console.log(product[0])
  
          // $('.description').html(`<p id="product">varenavn: ${product[0]} <br />Butikknavn: ${product[1]} <br />styrke: ${product[2].length>0 && !product[2]===null ? product[2] :'Utilgjengelig'}<br />mengde: ${product[3].length>0 && !product[3]===null ? product[3] :'Utilgjengelig'}</p>`)
          $('.description').html(`<p id="product">${product[0]} er tilgjengelig på <br /></p><span> ${product[1]} </span>`)
      }
    </script>
  </body>
</html>
