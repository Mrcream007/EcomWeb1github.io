<?php

session_start();
include("../database.php");
include("../functions/myfunctions.php");

// Category Page code
if(isset($_POST['add_category_btn'])){

    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $description = $_POST['description'];
    $meta_title = $_POST['meta_title'];
    $meta_description = $_POST['meta_description'];
    $meta_keywords = $_POST['meta_keywords'];
    $status = isset($_POST['status']) ? '1':'0';
    $popular = isset($_POST['popular']) ? '1':'0';

    //To upload Image
    $img = $_FILES['image']['name'];
    $path = "../uploads";
    $image_ext = pathinfo($img, PATHINFO_EXTENSION);
    $filename = time().'.'.$image_ext; //change the file name

    //To insert data
    $sql = "INSERT INTO categories (name, slug, description, meta_title, meta_description, meta_Keywords, status, popular, image) VALUES ('$name', '$slug', '$description', '$meta_title', '$meta_description', '$meta_keywords', '$status', '$popular', '$filename');";

    $sql_query = mysqli_query($con, $sql);

    //code to direct the path for the inserted values
    if(!empty($sql_query)){
        move_uploaded_file($_FILES['image']['tmp_name'], $path."/".$filename);
        redirect("../includes/adminAddCategory.php", "Category added successfully!");
        // $_SESSION['message'] = "Category added successfully!";

    }
    else{
        redirect("../includes/adminAddCategory.php", "Something went wrong!");
    }

}


?>