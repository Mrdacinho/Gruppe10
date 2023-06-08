<?php  
    session_start();
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <!--<![endif]-->
<html>
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>User Dashboard :: <?php echo $_SESSION['username']; ?> </title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="../css/dashboard.css" />
  </head>
  <body>
    <!--[if lt IE 7]>
      <p class="browsehappy">
        You are using an <strong>outdated</strong> browser. Please
        <a href="#">upgrade your browser</a> to improve your experience.
      </p>
    <![endif]-->
    
     <section>
      <div class="parent"> 
        <h4>👋 Hello <?php echo $_SESSION['username']; ?></h4>
        <p>account details</p>
        <p>😃 Username: <?php echo $_SESSION['username']; ?> </p>
        <p>📧 Email: <?php echo $_SESSION['email']; ?> </p>
        

          <?php
     
            if(isset($_POST['sign_out_btn'])) {
                 
               //logout the user user by unsetting the session
                session_destroy();

                 header("Location: ../");

                }
                    
            ?>

        <form method='post'>
            <input type="submit" name="sign_out_btn" value="Sign out" id="sign_out_btn"/>
        </form>
      </div>
     </section>

    <script src="" async defer></script>
  </body>
</html>
