<?php

$host = "localhost";
$username = "root";
$password = "";
$database = "phpecom";

try{
    $con = mysqli_connect($host, $username, $password, $database);
}
catch(mysqli_sql_exception){
    echo "Unsuccessful connection";
}

// if($con){
//     echo "Connection was successful";
// }

?>