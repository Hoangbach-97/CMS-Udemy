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
    if(isset($_POST['submit']))
    $search =  $_POST['search'];
    $query = "SELECT * FROM posts WHERE post_tags LIKE '%$search%'";
    $search_query = mysqli_query($connection,$query);
    if(!$search_query) die("Could not fetch data ". mysqli_error($connection));
    $count = mysqli_num_rows($search_query);
    if($count == 0) echo "<h2>No results found</h2>";
    else {

            while ($row = mysqli_fetch_array($search_query))
            { 
               $post_title =  $row['post_title'];
               $post_author =  $row['post_author'];
               $post_date =  $row['post_date'];
               $post_image =  $row['post_image'];
               $post_content =  $row['post_content'];
            
            ?>

            <!-- Blog Entries Column -->

                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <!-- First Blog Post -->
                <h2>
                    <a href="javascript:void(0)"><?php echo $post_title; ?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $post_author; ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date; ?></p>
                <hr>
                <img class="img-responsive border" src="images/<?php echo $post_image; ?>" alt="#">
                <hr>
                <p><?php echo $post_content; ?>.</p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>

                <!-- Second Blog Post -->
                
                
            <?php } 
            }?>
            <!-- Blog Sidebar Widgets Column -->

        </div>
        <?php include 'includes/sidebar.php'; ?>
        <!-- /.row -->

        <hr>
     <?php include 'includes/footer.php';?>
