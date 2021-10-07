<?php
if(isset($_GET['p_id']))
{
    $p_id = $_GET['p_id'];
    $query = "SELECT * FROM posts WHERE post_id = $p_id";
    $select_edit_post = mysqli_query($connection, $query);

}

while ($row = mysqli_fetch_array($select_edit_post))
{ 
   $post_id =  $row['post_id'];
   $post_author =  $row['post_author'];
   $post_title =  $row['post_title'];
   $post_category_id =  $row['post_category_id'];
   $post_status =  $row['post_status'];
   $post_image =  $row['post_image'];
   $post_date =  $row['post_date'];
   $post_comment_counts =  $row['post_comment_counts'];
   $post_tags =  $row['post_tags'];
   $post_content =  $row['post_content'];
}
?>
<?php

if(isset($_POST['update_post']))
{
    $post_title =  $_POST['post_title'];
    $post_author =  $_POST['post_author'];
    // $post_category_id =  $_POST['post_category_id'];
    $post_status =  $_POST['post_status'];

    $post_image =  $_FILES['post_image']['name'];
    $post_image_temp =  $_FILES['post_image']['tmp_name'];

    $post_tags =  $_POST['post_tags'];
    $post_content =  $_POST['post_content'];
    // $post_date =  date('Y-m-d');
    $post_comment_counts = 40;
    move_uploaded_file($post_image_temp, "../images/$post_image");

    $query = "UPDATE posts SET post_category_id='$post_category_id',
    post_title=' $post_title',post_author='$post_author',
    post_image='$post_image',post_content='$post_content',post_tags='$post_tags',
    post_status='$post_status', post_date=now() WHERE post_id = $post_id";

    $update_post =  mysqli_query($connection, $query);
    // confirm($update_post);

    echo "<p class='bg-success'>Post updated <a href='../post.php?p_id=$post_id' >View Post</a> </p>";
}

?>

<form action="" method="POST" enctype="multipart/form-data">

<div class="form-group">
    <label for="title">Post Title</label>
    <input type="text" class="form-control" placeholder="OK" name="post_title" value=<?= $post_title; ?> >
</div>
<div class="form-group">
    <label for="post_author">Post Author</label>
    <input type="text" class="form-control" placeholder="OK" name="post_author" value=<?= $post_author; ?>>
</div>
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
    <select name="post_status" id="">


    <option value='<?=$post_status?>'><?=$post_status?></option> 

<?php 


if($post_status =='published')
echo "<option value='draft'>Draft</option>";
else 
echo "<option value='published'>Publish </option>";

?>


    </select>
</div>

<!-- <div class="form-group">
    <label for="post_status">Post Status</label>
    <input type="text" class="form-control" placeholder="OK" name="post_status" value=<?= $post_status; ?>>
</div> -->
<div class="form-group">
    <label for="post_image">Post Image</label>
    <input type="file" class="form-control" placeholder="OK" name="post_image" >
</div>
<!-- <div class="form-group">
    <img width="100px" src="../images/<?= $post_image;?>" alt="#">
</div> -->
<div class="form-group">
    <label for="post_tags">Post Tags</label>
    <input type="text" class="form-control" placeholder="OK" name="post_tags" value=<?= $post_tags; ?>>
</div>
<div class="form-group">
<textarea name="post_content" id="summernote" cols="230" rows="10" ><?= $post_content; ?>

</textarea>
</div>
<div class="form-group">
    <input type="submit" class="btn btn-primary" value="Publish" name="update_post"  >
</div>
</form>