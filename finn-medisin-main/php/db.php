<?php


//  $servername = 'localhost';
//     $username = 'root';
//     $password = '';
//     $dbname = "butikkvare";
//     $connection = mysqli_connect($servername, $username, $password, $dbname);
      
//     // Check connection
//     if(!$connection){
//         echo('Database connection error : ' .mysql_error());
//     }


// //Get Heroku ClearDB connection information
// $cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
// $cleardb_server = 'eu-cdbr-west-03.cleardb.net';
// $cleardb_username = 'bc60738b7850a1';
// $cleardb_password = '93349222';
// $cleardb_db = substr($cleardb_url["path"],1);
// $active_group = 'default';
// $query_builder = TRUE;
// // Connect to DB
// $connection = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);

//     // Check connection
//     if(!$connection){
//         echo('Database connection error : ' .mysql_error());
//     }

//Get Heroku ClearDB connection information
$cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
$cleardb_server = 'eu-cdbr-west-03.cleardb.net';
$cleardb_username = 'bc60738b7850a1';
$cleardb_password = '93349222';
$cleardb_db = 'heroku_129bc88e78eccca';
$active_group = 'default';
$query_builder = TRUE;
// Connect to DB
$conn = new mysqli($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);

    // Check connection
    if(!$conn){
        echo('Database connection error : ' .mysql_error());
    } 
?>

