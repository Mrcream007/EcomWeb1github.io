<?php

include("../database.php");

// function for edit_categories.php starts
function getByID($table, $id){
    global $con;
    $query = "SELECT * FROM $table WHERE id = $id;";
    return $query_run = mysqli_query($con, $query);
}
// function for edit_categories.php ends

// function for categories.php starts
function getAll($table){
    global $con;
    $query = "SELECT * FROM $table";
    return $query_run = mysqli_query($con, $query);
}
// functions for categories.php ends

function redirect($url, $message){
    $_SESSION['message'] = $message;
    header('location: '.$url);
    exit();
}

?>