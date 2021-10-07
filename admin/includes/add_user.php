<?php
if(isset($_POST['create_user']))
{
    // $user_id =  $_POST['user_id'];
    $user_firstname =  $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $user_role =  $_POST['user_role'];

    // $post_image =  $_FILES['post_image']['name'];
    // $post_image_temp =  $_FILES['post_image']['tmp_name'];

    $username =  $_POST['username'];
    $user_email =  $_POST['user_email'];
    $user_password = $_POST['user_password'];
    // $post_date =  date('Y-m-d');

    // $post_comment_counts = 40;
    // move_uploaded_file($post_image_temp, "../images/$post_image");

$query = "INSERT INTO users(user_firstname, user_lastname, username, user_email, user_password,user_role) 
VALUES ('$user_firstname','$user_lastname','$username','$user_email','$user_password','$user_role')";


$create_user_query = mysqli_query($connection,$query);
// confirm($create_post_query);
// if(!$create_post_query) die("Error ". mysqli_error($connection));

}

?>
<form action="" method="POST" enctype="multipart/form-data">

<div class="form-group">
    <label for="title">First Name</label>
    <input type="text" class="form-control" placeholder="OK" name="user_firstname" >
</div>
<div class="form-group">
    <label for="post_author">Last Name</label>
    <input type="text" class="form-control" placeholder="OK" name="user_lastname" >
</div>
<!-- <div class="form-group">
    <label for="post_category">Post Category</label>
    <input type="text" class="form-control" placeholder="OK" name="post_category_id" >
</div> -->

<div class="form-group">
    <select name="user_role" id="">


<option value="Subcriber" default selected>Select options</option>
<option value="Admin">Admin</option>
<option value="Subcriber">Subcriber</option>


    </select>
</div>

<div class="form-group">
    <label for="post_status">Username</label>
    <input type="text" class="form-control" placeholder="OK" name="username" >
</div>
<!-- <div class="form-group">
    <label for="post_image">Email</label>
    <input type="file" class="form-control" placeholder="OK" name="user_email" >
</div> -->
<div class="form-group">
    <label for="post_tags">Email</label>
    <input type="text" class="form-control" placeholder="OK" name="user_email" >
</div>
<div class="form-group">
    <label for="post_tags">Password</label>
    <input type="text" class="form-control" placeholder="OK" name="user_password" >
</div>

    <input type="submit" class="btn btn-primary" value="Add User" name="create_user"  >
</div>
</form>