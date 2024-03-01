<?php


include('../functions/myfunctions.php');
// Code to secure that only admins can access the admin page
if(isset($_SESSION['auth'])){

    if($_SESSION['role_as'] != 1){
        redirect("../index.php", "You're not an admin!");
    }
}

else{
    redirect('../login.php', 'login to continue');
}

?>