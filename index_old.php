<?php include('includes/header.php');
      include('includes/db.php');
?>

    <!-- Navigation -->

    <?php include('includes/navigation.php'); ?>

    <!-- Page Content -->
    <div class="container">
        
        <div class="row">
        <div class="col-md-8">

        <?php 
            
            $query = "SELECT * FROM posts";
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
