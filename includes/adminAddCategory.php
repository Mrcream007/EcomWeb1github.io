<?php
   
    include("adminHeader.php") ;

    // include("middleware/adminMiddleware.php");
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card_header">
                    <h4>Add Category</h4>
                </div>
                <div class="card-body">
                    <form action="../admin/catcode.php" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Please enter name">
                        </div>
                        <div class="col-md-6">
                            <label for="">Slug</label>
                            <input type="text" name="slug" class="form-control" placeholder="Enter slug">
                        </div>
                        <div class="col-md-12">
                            <label for="">Description</label>
                            <input type="text" name="description" class="form-control" placeholder="Enter description">
                        </div>
                        <div class="col-md-12">
                            <label for="">Upload Image</label>
                            <input type="file" name="image" class="form-control" placeholder="Upload image">
                        </div>
                        <div class="col-md-12">
                            <label for="">Meta Title</label>
                            <input type="text" name="meta_title" class="form-control" placeholder="Enter meta-title">
                        </div>
                        <div class="col-md-12">
                            <label for="">Meta Description</label>
                            <input type="text" name="meta_description" class="form-control" placeholder="Enter meta description">
                        </div>
                        <div class="col-md-12">
                            <label for="">Meta Keywords</label>
                            <input type="text" name="meta_keywords" class="form-control" placeholder="Enter meta keywords">
                        </div>
                        <div class="col-md-6">
                            <label for="">Status</label>
                            <input type="checkbox" name="status">
                        </div>
                        <div class="col-md-6">
                            <label for="">Popular</label>
                            <input type="checkbox" name="popular">
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class ="btn btn-primary" name="add_category_btn">Save</button>
                        </div>
                    </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    include("adminFooter.php");
?>