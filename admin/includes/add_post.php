<?php
if(isset($_POST['create_post']))
{
    $post_title =  $_POST['post_title'];
    $post_author =  $_POST['post_author'];
    $post_category_id =  $_POST['post_category'];
    $post_status =  $_POST['post_status'];

    $post_image =  $_FILES['post_image']['name'];
    $post_image_temp =  $_FILES['post_image']['tmp_name'];

    $post_tags =  $_POST['post_tags'];
    $post_content =  $_POST['post_content'];
    $post_date =  date('Y-m-d');

    // $post_comment_counts = 40;
    move_uploaded_file($post_image_temp, "../images/$post_image");

$query = "INSERT INTO posts(post_category_id, post_title, post_author, post_date, post_image, post_content,post_tags, post_status) 
VALUES ('$post_category_id','$post_title',' $post_author',now(),' $post_image','$post_content','$post_tags',' $post_status')";


$create_post_query = mysqli_query($connection,$query);
// confirm($create_post_query);
// if(!$create_post_query) die("Error ". mysqli_error($connection));
$post_id = mysqli_insert_id($connection);
echo "<p class='bg-success'>Post Create <a href='../post.php?p_id=$post_id' >View Post</a> </p>";


}

?>
<form action="" method="POST" enctype="multipart/form-data">

<div class="form-group">
    <label for="title">Post Title</label>
    <input type="text" class="form-control" placeholder="OK" name="post_title" >
</div>
<div class="form-group">
    <label for="post_author">Post Author</label>
    <input type="text" class="form-control" placeholder="OK" name="post_author" >
</div>
<!-- <div class="form-group">
    <label for="post_category">Post Category</label>
    <input type="text" class="form-control" placeholder="OK" name="post_category_id" >
</div> -->

<div class="form-group">
    <select name="post_category" id="">


<?php 
$query = "SELECT * FROM categories";
$select_categories = mysqli_query($connection, $query);

confirm($select_categories);

while ($row = mysqli_fetch_array($select_categories))
{ 
   $cat_title =  $row['cat_title'];
   $cat_id =  $row['cat_id'];
    echo "<option value='$cat_id'>$cat_title</option>";
}
?>


    </select>
</div>

<div class="form-group">
    <!-- <label for="post_status">Post Status</label> -->
    <select name="post_status" id="">
        <option value="draft" disabled selected>Select Status</option>
        <option value="draft">Draft</option>
        <option value="published">Publish</option>
    </select>
    <!-- <input type="text" class="form-control" placeholder="OK" name="post_status" > -->
</div>
<div class="form-group">
    <label for="post_image">Post Image</label>
    <input type="file" class="form-control" placeholder="OK" name="post_image" >
</div>
<div class="form-group">
    <label for="post_tags">Post Tags</label>

    <input type="text" class="form-control" placeholder="OK" name="post_tags" >
</div>
<div class="form-group">
<textarea name="post_content" id="summernote" cols="230" rows="10">


</textarea>
</div>
<div class="form-group">
    <input type="submit" class="btn btn-primary" value="Publish" name="create_post"  >
</div>
</form>