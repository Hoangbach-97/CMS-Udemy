<?php
if(isset($_GET["user_id"]))
{
    $the_user_id = $_GET["user_id"];
    $query = "SELECT * FROM users WHERE user_id = $the_user_id";
    $result = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_array($result))
    {
        $user_firstname =  $row['user_firstname'];
        $user_lastname = $row['user_lastname'];
        $user_role =  $row['user_role'];
        $username =  $row['username'];
        $user_email =  $row['user_email'];
        $user_password = $row['user_password'];
            
    }
}
?>

<form action="" method="POST" enctype="multipart/form-data">

<div class="form-group">
    <label for="title">First Name</label>
    <input type="text" class="form-control" placeholder="OK" name="user_firstname" value="<?=$user_firstname?>">
</div>
<div class="form-group">
    <label for="post_author">Last Name</label>
    <input type="text" class="form-control" placeholder="OK" name="user_lastname" value="<?=$user_lastname?>">
</div>
<!-- <div class="form-group">
    <label for="post_category">Post Category</label>
    <input type="text" class="form-control" placeholder="OK" name="post_category_id" >
</div> -->

<div class="form-group">
    <select name="user_role" id="">

<!-- <option value="subcriber" default selected>Select options</option> -->
<?php 
if($user_role=='Subcriber')
{ 
    echo " <option value='Subcriber' selected>Subcriber</option>";
    echo " <option value='Admin' >Admin</option>";
}else{

    echo " <option value='Subcriber'>Subcriber</option>";
    echo " <option value='Admin' selected>Admin</option>";
}

?>


    </select>
</div>

<div class="form-group">
    <label for="post_status">Username</label>
    <input type="text" class="form-control" placeholder="OK" name="username" value="<?=$username?>">
</div>
<!-- <div class="form-group">
    <label for="post_image">Email</label>
    <input type="file" class="form-control" placeholder="OK" name="user_email">
</div> -->
<div class="form-group">
    <label for="post_tags">Email</label>
    <input type="text" class="form-control" placeholder="OK" name="user_email" value="<?=$user_email?>">
</div>
<div class="form-group">
    <label for="post_tags">Password</label>
    <input type="text" class="form-control" placeholder="OK" name="user_password" value="<?=$user_password?>">
</div>

    <input type="submit" class="btn btn-primary" value="Update User" name="update_user"  >
</div>
</form>

<?php
if(isset($_POST['update_user']))
{
    // $user_id =  $_POST['user_id'];
    $user_firstname_up =  $_POST['user_firstname'];
    $user_lastname_up = $_POST['user_lastname'];
    $user_role_up =  $_POST['user_role'];

    // $post_image =  $_FILES['post_image']['name'];
    // $post_image_temp =  $_FILES['post_image']['tmp_name'];

    $username_up =  $_POST['username'];
    $user_email_up =  $_POST['user_email'];
    $user_password_up = $_POST['user_password'];
    // $post_date =  date('Y-m-d');

    // $post_comment_counts = 40;
    // move_uploaded_file($post_image_temp, "../images/$post_image");
    $query = "SELECT randSalt FROM users";
            $run_ranSalt_query = mysqli_query($connection,$query);
            if(!$run_ranSalt_query)
            {
                die("Error ".mysqli_error($connection));
            }
            $row = mysqli_fetch_array($run_ranSalt_query);
            $passCrypt = crypt($user_password_up, $row['randSalt']);

    $query = "UPDATE users SET user_firstname='$user_firstname_up', user_lastname='$user_lastname_up',
    username='$username_up', user_email='$user_email_up', user_password='$passCrypt',user_role='$user_role_up'
    WHERE user_id= $the_user_id";


$edit_user = mysqli_query($connection,$query);
// confirm($create_post_query);
// if(!$create_post_query) die("Error ". mysqli_error($connection));

}

?>
