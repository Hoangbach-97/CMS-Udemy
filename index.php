<?php include('includes/header.php');

// $session = session_id();
// $time = time();
// $time_out_insecond = 60;
// $time_out = $time - $time_out_insecond;
// $query = "SELECT * FROM user_online WHERE session = '$session'";
// $run_query = mysqli_query($connection, $query);
// $count = mysqli_num_rows($run_query);
// if($count == NULL) {
//     mysqli_query($connection, "INSERT INTO user_online VALUES('$session','$time' ");
// }else{
//     mysqli_query($connection, "UPDATE user_online SET time = '$time' WHERE session = '$session'");
// }

      include('includes/db.php');
?>

    <!-- Navigation -->

    <?php include('includes/navigation.php'); ?>

    <!-- Page Content -->
    <div class="container">
        
        <div class="row">
        <div class="col-md-8">

        <?php 
        // $post_query_count = "SELECT * FROM posts";
        // $run_query_count = mysqli_query($connection, $post_query_count);
        // $count_posts = mysqli_num_rows($run_query_count);
        // $count_posts = ceil($count_posts /2);
        // if(isset($_GET['page']))
        // {
        //     $page = $_GET['page'];
        // }


            // $query = "SELECT * FROM posts LIMIT $page,2";
            $query = "SELECT * FROM posts ";
            $select_all_posts_query = mysqli_query($connection, $query);
            while ($row = mysqli_fetch_assoc($select_all_posts_query))
            { 
               $post_title =  $row['post_title'];
               $post_id =  $row['post_id'];
               $post_author =  $row['post_author'];
               $post_date =  $row['post_date'];
               $post_image =  $row['post_image'];
               $post_content =  substr($row['post_content'], 0,88) . "...";
            //    $post_status = $row['post_status']; 


            //    if($post_status !== 'published')
            //    {
            //        echo "<h2>This post is not published</h2>";
            //    }
            //    else{

            
            ?>

            <!-- Blog Entries Column -->

                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <!-- First Blog Post -->
                <h2>
                    <a href="post.php?p_id=<?=$post_id?>"><?php echo $post_title; ?></a>
                </h2>
                <p class="lead">
                    by <a href="author_post.php?author=<?php echo $post_author; ?>&p_id=<?php echo $post_id; ?>"><?php echo $post_author; ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date; ?></p>
                <hr>
                <img class="img-responsive border" src="images/<?php echo $post_image; ?>" alt="#">
                <hr>
                <p><?php echo $post_content; ?>.</p>
                <a class="btn btn-primary" href="post.php?p_id=<?=$post_id?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>

                <!-- Second Blog Post -->
                
                
               
            <?php }?>

            <!-- Blog Sidebar Widgets Column -->

        </div>
        <?php include 'includes/sidebar.php'; ?>
        <!-- /.row -->
        
        <hr>
        
     <?php include 'includes/footer.php';?>
   <div class="containerr">
       <div class="row">
       <ul class='pager'>
       <?php 
    for($i=1; $i<=$count_posts; $i++) {
        if($i == $page)
        {
            echo "<li><a class='active_link' href='index.php?page=$i'>$i</a></li>";
        }
        else {
            echo "<li><a href='index.php?page=$i'>$i</a></li>";

        }
    }
    
    ?>
    </ul>
       </div>
   </div>