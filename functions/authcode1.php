<?php

    include("../database.php");
    session_start();

    // Registration starts
    if(isset($_POST["register"]))
    {

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

                else{
                    if($password1 == $cpassword){
                        $sql = "INSERT INTO users (name, email, phone, password) VALUES ('$username1', '$email', '$phone', '$password1')";
                        $insert_query_run = mysqli_query($con, $sql);
                    
                            if($insert_query_run){
                                $_SESSION['message']= "Registered successfully";
                                header('location: ../login.php');
                            }
                        
                            else{
                                $_SESSION['message'] = "Something went wrong!";
                                header('Location: ../register.php');
                            }
                        }  
                        else{
                            $_SESSION['message'] = "Passwordd do not match";
                            header('Location: ../register.php');
                        }  
                }
                
        
    }

    // Login starts
   
        elseif(isset($_POST['login'])){
            // $username1 = mysqli_real_escape_string($con,$_POST["username"]);
            $password1 = mysqli_real_escape_string($con,$_POST["password"]);
            // $cpassword = mysqli_real_escape_string($con,$_POST["cpassword"]);
            $email = mysqli_real_escape_string($con,$_POST["email"]);
 
            $login_query = "SELECT * FROM users WHERE email = '$email' AND password = '$password1';";
            $login_check_query = mysqli_query($con, $login_query);

            if(mysqli_num_rows($login_check_query) > 0){
                
                $_SESSION["auth"] = true;

                $userdata = mysqli_fetch_array($login_check_query);
                $username_1 = $userdata['name'];
                $useremail = $userdata['email'];
                $role_as = $userdata['role_as']; //for the admin
                

                $_SESSION['auth_user'] = [
                    'name' => $username_1,
                    'email' => $useremail
                ];

                //Code for admin login
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
            else{
                $_SESSION['message'] = "Invalid credentials";
                header('location: ../login.php');
            }  
        }
        
    ?>