<?php

session_start();
include("../database.php");

//Registration code starts
if(isset($_POST['register'])){

    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $hash = password_hash($password, PASSWORD_DEFAULT);

    //    Start of Checking if email already exists
    $check_email_query = "SELECT * FROM users WHERE email = '$email';";
    $check_email_query_run = mysqli_query($con, $check_email_query);

    if(mysqli_num_rows($check_email_query_run) > 0){
        $_SESSION['message'] = "Email already exists!";
        header("Location: ../register.php");
    }
    // End of Checking if email already exists

    elseif(empty($username)){
        $_SESSION['message'] = "Username is required";
        header("location: ../register.php");
    }
    elseif(empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)){
        $_SESSION['message'] = "A valid Email is required";
        header("location: ../register.php");
    }
    elseif(empty($phone)){
        $_SESSION['message'] = "Phone number is required";
        header("location: ../register.php");
    }
    elseif(empty($password) || strlen($password) < 7){
        $_SESSION['message'] = "Password is required";
        header("location: ../register.php");
    }
    elseif($password !== $cpassword){
        $_SESSION['message'] = "Password does not match";
        header("location: ../register.php");
    }
    elseif(empty($cpassword)){
        $_SESSION['message'] = "Please confirm your password";
        header("location: ../register.php");
    }
    else{
        
        $sql_con = "INSERT INTO users (name, phone, password, email) VALUES ('$username', '$phone', '$hash', '$email');";
        $register_check = mysqli_query($con, $sql_con);
        header("location: ../login.php");
        die();
    }
}
//Registration code ends


//Login code starts

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql_login = "SELECT * FROM users WHERE name = '$username';" ;
    $login_check = mysqli_query($con, $sql_login);

    $user = mysqli_fetch_array($login_check, MYSQLI_ASSOC);

    //making sure the email matches the registration email used earlier
    if($user){
        if($passVerify = password_verify($password, $user['password'])){
            $_SESSION["auth"] = true;

           
             $username_1 = $user['name'];
             $useremail = $user['email'];
             $role_as = $user['role_as']; //for admin

             $_SESSION['auth_user'] = [
                'name' => $username_1,
                'email' => $useremail
             ];

             //Admin code starts
             $_SESSION['role_as']=  $role_as;

            if($role_as == 1){
                $_SESSION['message'] = "Welcome to the Dashboard!";
                header("location: ../includes/adminHome.php");
                
            }
            else{
                $_SESSION['message'] = "Login successful!";
                header("location: ../index.php");
                die();
            }
             //Admin code ends

            // $_SESSION['message'] = "Login successful!";
            // header("location: ../index.php");
            // die();
        }
        elseif(empty($passVerify)){
            $_SESSION['message'] = "Correct Password must be filled!";
            header("location: ../login.php");
        }
    }
    else{
        $_SESSION['message']= "Username or password does not match";
        header("location: ../login.php");
    }
}

//Login code ends

?>