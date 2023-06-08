<?php
require_once "db.php";
// Henter user input fra login 
$email = $_POST['email'];
$password = $_POST['password'];


// SQL query
$sql = "SELECT * FROM users WHERE email = '$email'";
$result = $conn->query($sql);

// Sjekker hvis bruker som matcher er funnet
// if (!empty($result) && $result->num_rows > 0) {


    //  Sjekker for feil i query execution
if (!$result) {
    throw new Exception("Query failed: " . $conn->error);
}

// Sjeker hvis matchet bruker er funnet
if ($result->num_rows ==1) {
    $row = $result->fetch_assoc();
    //Verify the password
    if (md5('pass9090') == $row['password']) {
        // Passord er korrekt, loggin bruker
        session_start();
        $_SESSION['user_id'] = $row['ID'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['email'] = $row['email'];
        // echo "Login successful! "."Welcome ".$row['username'];
        // Omdiriger til hjemmesiden eller et annet ønsket sted
        
        header("Location: home.php");
        exit();
    } else {
        // Invalid password
          throw new Exception("Query failed: " . $conn->error);  
     }
} else {
    // No matching user found
    throw new Exception("User not found!");
}

// Lukk database connection
$conn->close();

?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <!--<![endif]-->
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Home Page</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <h1>Hello there. Welcome <?php echo $_SESSION['username']; ?></h1>
        <script src="" async defer></script>
    </body>
</html>
