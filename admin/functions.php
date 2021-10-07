<?php
                       function confirm($result)
                       {
                         global $connection;
                         if(!$result) die("QUERY FAILED ". mysqli_error($connection));
                       }
                       
                       function insert_categories(){
                              global $connection;
                                
                            if (isset($_POST['submit'])) {
                                $cat_title = $_POST['cat_title'];
                                if ($cat_title=="" || empty($cat_title)) {
                                    # code...
                                    echo "This field should not empty";
                                }
                                else {
                                    $query = "INSERT INTO Categories(cat_title) VALUES('$cat_title')";
                                    $query_categories = mysqli_query($connection, $query);
                                    if(!$query_categories) die("Couldn't connect to".mysqli_error($connection));
                                }
                            }
                          }


                          function findAllCategory()
                          {
                              global $connection;
                              
                            $query = "SELECT * FROM categories";
                            $select_all_categories = mysqli_query($connection, $query);
                         
                            while ($row = mysqli_fetch_array($select_all_categories))
                            { 
                               $cat_title =  $row['cat_title'];
                               $cat_id =  $row['cat_id'];
                               echo " <tr>";
                               echo "<td>{$cat_id}</td>";
                               echo "<td>{$cat_title}</td>"; 
                               echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a> </td>"; 
                               echo "<td><a href='categories.php?edit={$cat_id}'>Edit</a> </td>"; 
                               echo " </tr>";

                                // echo "<li > <a href='javascript:void(0)'>".$cat_title."</a></li>";
                            }
                          }



                          function deleteCategory()
                          {
                              global $connection;
                              if(isset($_GET['delete'])){
                                $get_cat_id = $_GET['delete'];
                                $query = "DELETE FROM categories WHERE cat_id=$get_cat_id";
                                $query_delete = mysqli_query($connection, $query);
                                header("Location: categories.php");
                            }
                          }
                         
                            
?>