<?php 

if(isset($_POST['checkBoxArray']))
{
    foreach($_POST['checkBoxArray'] as $checkBox)
    {
        $bulk_options = $_POST['bulk_options'];
        switch($bulk_options)
        {
            case 'published':
                $query = "UPDATE posts SET post_status = '$bulk_options' WHERE post_id = $checkBox";
                $run_query = mysqli_query($connection, $query);
                break;
            case 'draft':
                $query = "UPDATE posts SET post_status = '$bulk_options' WHERE post_id = $checkBox";
                $run_query = mysqli_query($connection, $query);
                break;
            case 'delete':
                $query = "DELETE FROM posts WHERE post_id = $checkBox";
                $run_query = mysqli_query($connection, $query);
                break;
        }
    }


} 


?>





<form action="" method="POST" >
<table class="table table-striped table-bordered table-hover">

<div id="bulkOptionContainer" class="col-xs-2 ">
    <select name="bulk_options" id="" class="form-control">
        <option value="">select options</option>
        <option value="published">Publish</option>
        <option value="draft">Draft</option>
        <option value="delete">Delete</option>
    </select>
</div>
<div class="col-xs-4">
<input type="submit" name="submit" value="Apply" class="btn btn-primary">
<a href="post.php?source=add_post" class="btn btn-primary">Add Post</a>
</div>

                         <thead>
                             <tr>
                                 <th><input type="checkbox" id="selectAllBoxes"> </th>
                                 <th>Id</th>
                                 <th>Author</th>
                                 <th>Title</th>
                                 <th>Category</th>
                                 <th>Status</th>
                                 <th>Image</th>
                                 <th>Tags</th>
                                 <th>Comments</th>
                                 <th>Date</th>
                                 <th>Date</th>
                                 <th>View</th>
                                 <th>Delete</th>
                             </tr>
                         </thead>
                         <tbody>
                        <?php 
                        
                        $query = "SELECT * FROM posts";
                            $select_all_posts = mysqli_query($connection, $query);
                         
                            while ($row = mysqli_fetch_array($select_all_posts))
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
?>

                              <tr>  <td><input type="checkbox" class="checkBoxes" name="checkBoxArray[]" value="<?=$post_id?>"> </td>
<?php
                            //    echo "<tr>";
                               echo "<td>$post_id</td>";
                               echo "<td>$post_author</td>";
                               echo "<td>$post_title</td>";

                                $query = "SELECT * FROM categories WHERE cat_id = $post_category_id";
                                $select_categories_id = mysqli_query($connection, $query);
                                while ($row = mysqli_fetch_assoc($select_categories_id)) {
                                    $cat_id = $row['cat_id'];
                                    $cat_title = $row['cat_title'];
                                    # code...
                                    echo "<td>$cat_title</td>";
                                }

                            //    echo "<td>$post_category_id</td>";
                               echo "<td>$post_status</td>";
                               echo "<td><img width='150px'  src='../images/$post_image'></td>";
                               echo "<td>$post_tags</td>";
                               echo "<td> $post_comment_counts</td>";
                               echo "<td>$post_date</td>";
                               echo "<td><a href='../post.php?p_id=$post_id'>View</a> </td>";
                               echo "<td><a href='post.php?source=edit_post&p_id=$post_id'>Edit</a> </td>";
                               echo "<td><a onClick=\"javacript: return confirm('B???n c?? mu???n x??a kh??ng?'); \" href='post.php?delete=$post_id'>Delete</a> </td>";
                               echo "</tr>";
                        
                            }?>
                         </tbody>

                     </table>

                     </form>
                     <?php 
                     
                     if(isset($_GET['delete'])){
                        $post_id = $_GET['delete'];
                        $query = "DELETE FROM posts WHERE post_id = $post_id";
                        $delete_post = mysqli_query($connection,$query);
                        if(!$delete_post) die("Error ". mysqli_error($connection));
                        header("Location: post.php");

                     }
                     
                     ?>