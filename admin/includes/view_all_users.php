<table class="table table-striped table-bordered table-hover">
                         <thead>
                             <tr>
                                 <th>Id</th>
                                 <th>Username</th>
                                 <th>FirstName</th>
                                 <th>LastName</th>
                                 <th>Email</th>
                                 <th>Role</th>
                                 <th>Date</th>
                                 
                             </tr>
                         </thead>
                         <tbody>
                        <?php 
                        
                        $query = "SELECT * FROM users";
                            $select_all_users = mysqli_query($connection, $query);
                         
                            while ($row = mysqli_fetch_assoc($select_all_users))
                            { 
                               $user_id =  $row['user_id'];
                               $username = $row['username'] ;
                               $user_password =  $row['user_password'];
                               $user_firstname =  $row['user_firstname'];
                               $user_lastname = $row['user_lastname']; 
                               $user_email =  $row['user_email'];
                               $user_image =  $row['user_image'];
                               $user_role =  $row['user_role'];

                               echo "<tr>";
                               echo "<td>$user_id</td>";
                               echo "<td>$username</td>";
                               echo "<td>$user_firstname</td>";
                               echo "<td>$user_lastname</td>";

                                // $query = "SELECT * FROM categories WHERE cat_id = $post_category_id";
                                // $select_categories_id = mysqli_query($connection, $query);
                                // while ($row = mysqli_fetch_assoc($select_categories_id)) {
                                //     $cat_id = $row['cat_id'];
                                //     $cat_title = $row['cat_title'];
                                //     # code...
                                //     echo "<td>$cat_title</td>";
                                // }

                            //    echo "<td>$post_category_id</td>";

                            //    echo "<td>$comment_status</td>";
                            //         $query = "SELECT * FROM posts  WHERE post_id = $comment_post_id";
                            //         $select_post_id_query = mysqli_query($connection, $query);
                            //         while($row = mysqli_fetch_assoc($select_post_id_query))
                            //     {
                            //         $post_id = $row['post_id'];
                            //         $post_title =  $row['post_title'];
                            //         echo "<td><a href='../post.php?p_id=$post_id'>$post_title</a> </td>";

                            //     }






                               echo "<td>$user_email</td>";
                               echo "<td>$user_role</td>";
                            //    echo "<td><img width='150px'  src='../images/$post_image'></td>";
                            //    echo "<td>$post_tags</td>";
                            //    echo "<td> $post_comment_counts</td>";
                            //    echo "<td>$post_date</td>";

                               echo "<td><a href='users.php?Change_Role_Admin=$user_id'>Admin</a> </td>";
                               echo "<td><a href='users.php?Change_Role_Subcriber=$user_id'>Subcriber</a> </td>";
                               echo "<td><a href='users.php?source=edit_user&user_id=$user_id'>Edit</a> </td>";
                               echo "<td><a href='users.php?delete=$user_id'>Delete</a> </td>";

                               echo "</tr>";
                        
                            }?>
                         </tbody>

                     </table>

                     <?php 
                    if(isset($_GET['Change_Role_Admin'])){
                        $the_user_id = $_GET['Change_Role_Admin'];
                        $query = "UPDATE users SET user_role = 'Admin' WHERE user_id =$the_user_id";
                        $change_admin = mysqli_query($connection,$query);
                        if(!$change_admin) die("Error ". mysqli_error($connection));
                        header("Location: users.php");

                    }



                    if(isset($_GET['Change_Role_Subcriber'])){
                        $the_user_id = $_GET['Change_Role_Subcriber'];
                        $query = "UPDATE users SET user_role = 'Subcriber' WHERE user_id =$the_user_id";
                        $change_subcriber = mysqli_query($connection,$query);
                        if(!$change_subcriber) die("Error ". mysqli_error($connection));
                        header("Location: users.php");

                    }         

                     

                     if(isset($_GET['delete'])){
                         if(isset($_SESSION['user_role']))
                         {
                             if($_SESSION['user_role']=='Admin')
                             {

                                 $the_user_id =mysqli_real_escape_string($connection, $_GET['delete']);
                                 $query = "DELETE FROM users WHERE user_id = $the_user_id";
                                 $delete_user = mysqli_query($connection,$query);
                                 if(!$delete_user) die("Error ". mysqli_error($connection));
                                 header("Location: users.php");
                                }
                            }
                      

                     }
                     
                     ?>