<?php
    session_start();
    include("includes/header.php") ;

    //To tell the user that they are already logged in
    if(isset($_SESSION['auth'])){

        $_SESSION['message'] = "You're already logged in";
        header("location: index.php");
        exit();
    }
?>
    
    
    <!-- reduce/adjust size of the form container -->
    <div class="py-5">

        <div class="container">

        <div class="row justify-content-center">

            <div class="col-md-5">

            <!-- Bootstrap Alert Message -->
            <?php  
            if(isset($_SESSION["message"]))
            {
            ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Hey!</strong> <?= $_SESSION["message"]; ?>.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php
                unset($_SESSION["message"]);
                }
                ?>
                <div class="card">
                    <div class="card-header">
                        <h4>Registration Form</h4>
                    </div>
                </div>
                <div class="card-body"><br>
                    <form action="functions/authcode2.php" method="post">

                    <div class="mb-3">
                            <label class="form-label">Username</label>
                            <input type="text" name="username" placeholder="Enter name" class="form-control">
                            
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email address</label>
                            <input type="email" name="email" placeholder="Enter your email" class="form-control" aria-describedby="emailHelp">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Phone no</label>
                            <input type="phone" name="phone" placeholder="Enter your phone number" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="password"  name="password" class="form-control"placeholder="Enter password" id="exampleInputPassword1">
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
                            <input type="password" name="cpassword" class="form-control" placeholder="Confirm password" id="exampleInputPassword1">
                        </div>

                        <!-- <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Check me out</label>
                        </div> -->
                        <button type="submit" name="register" class="btn btn-primary">Submit</button>
                    </form>
                </div>
          
            </div>

        </div>

    </div>
    

<?php

    include("./includes/footer.php");
?>
      
