<?php

    include("../database.php");
    session_start();

    // Registration starts
    if(isset($_POST["register"])){

        $username1 = mysqli_real_escape_string($con,$_POST["username"]);
        $password1 = mysqli_real_escape_string($con,$_POST["password"]);
        $cpassword = mysqli_real_escape_string($con,$_POST["cpassword"]);
       $email = mysqli_real_escape_string($con,$_POST["email"]);
       $phone = mysqli_real_escape_string($con,$_POST["phone"]);

    //    Start of Checking if email already exists
        $check_email_query = "SELECT email FROM users WHERE email = '$email';";
        $check_email_query_run = mysqli_query($con, $check_email_query);

        if(mysqli_num_rows($check_email_query_run) > 0){
            $_SESSION['message'] = "Email already exists!";
            header("Location: ../register.php");
        }
        // End of Checking if email already exists

        elseif(empty($username1)){
            $_SESSION["message"] = "username is empty";
            header("location: ../register.php");
        }
        elseif( empty($password1)){
            $_SESSION["message"] = "password is empty";
            header("location: ../register.php");
        }
        elseif(empty($phone) || empty( $email)){
            $_SESSION["message"] = "Phone number or email is missing";
            header("location: ../register.php");
        }
        elseif(empty($cpassword) || $password1 !== $cpassword){
            $_SESSION["message"] ="Password is empty or password doesn't match";
            header("location: ../register.php");
        }
        else{
            $sql = "INSERT INTO users (name, email, phone) VALUES ('$username1', '$email', '$phone')";
            mysqli_query($con, $sql);
            // echo "Registered successfully!";
            header("Location: ../login.php");
        }
    }
    // Registeration ends


    // Login starts
    if(isset($_POST["login"])){

        $username1 = mysqli_real_escape_string($con,$_POST["username"]);
        $password1 = mysqli_real_escape_string($con,$_POST["password"]);
            // $cpassword = mysqli_real_escape_string($con,$_POST["cpassword"]);
            $email = mysqli_real_escape_string($con,$_POST["email"]);
        

        
         if(empty($username1)){
             $_SESSION["message"] = "username is empty";
             header("location: ../login.php");
         }
         elseif( empty($password1)){
             $_SESSION["message"] = "email is empty";
             header("location: ../login.php");
         }
        
        //  elseif(empty($cpassword)){
        //      $_SESSION["message"] ="Password is empty";
        //      header("location: ../login.php");
        //  }
         else{
    
            $login_query = "SELECT * FROM users WHERE email = '$email' AND password = '$password1';";
            $login_check_query = mysqli_query($con, $login_query);

            
             $_SESSION["auth"] = true;

             $userdata = mysqli_fetch_array($login_check_query);
             $username_1 = $userdata['name'];
             $useremail = $userdata['email'];
             $role_as = $userdata['role_as']; //for admin

             $_SESSION['auth_user'] = [
                'name' => $username_1,
                'email' => $useremail
             ];

             //admin login code starts
             $_SESSION['role_as'] = $role_as;

             if($role_as == 1){
                $_SESSION['message'] = "Welcome Admin";
                header("location: ../admin/index.php");
             }
             else{
                $_SESSION['message'] = 'Logged in Successfully!';

                header("Location: ../index.php");
             }
             
         }
    // Login ends
        }

    mysqli_close($con);
?>