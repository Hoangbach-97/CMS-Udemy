 <form action="" method="post">
                                <label for="cat_title">Edit Categories</label>

                                <?php
                               if(isset($_GET['edit']))
                               {
                                   $cat_id = $_GET['edit'];

                                $query = "SELECT * FROM categories WHERE cat_id = $cat_id";
                                $select_categories_id = mysqli_query($connection, $query);
                             
                                while ($row = mysqli_fetch_array($select_categories_id))
                                { 
                                   $cat_title =  $row['cat_title'];
                                   $cat_id =  $row['cat_id'];
                                   
                                   ?>

                                <?php }}?>

                                <?php 
                                
                                if(isset($_POST['update_category'])){
                                    $the_cat_title = $_POST['cat_title'];
                                    $query = "UPDATE  categories SET cat_title ='$the_cat_title' WHERE cat_id=$cat_id";
                                    $query_delete = mysqli_query($connection, $query);
                                }
                                ?>

                                <div class="form-group">
                                    <input value = '<?php if(isset($cat_title)) echo $cat_title;?>'class="form-control" type="text" name ="cat_title" >
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" name="update_category" value="Update Category">
                                </div>
                            </form>