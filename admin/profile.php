<?php include('includes/admin_header.php'); 

?>


    <div id="wrapper">

        <!-- Navigation -->
        <?php include 'includes/admin_nav.php'; ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                     <h1>PROFILE</h1>
                       <?php 
                       if(isset($_SESSION['username']))
                       {
                        $user_info = $_SESSION['username'];
                       $query = "SELECT * FROM users WHERE username = '$user_info' ";
                       $user_info_query = mysqli_query($connection, $query);
                       while ($row = mysqli_fetch_array($user_info_query))
                       {
                           $username = $row['username'];
                           $user_firstname = $row['user_firstname'];
                           $user_role = $row['user_role'];
                           $user_lastname = $row['user_lastname'];
                           $user_email = $row['user_email'];
                       }

                    }

                       ?>


<form action="" method="POST" enctype="multipart/form-data">

<div class="form-group">
    <label for="title">First Name</label>
    <input type="text" class="form-control" name="user_firstname" value="<?=$user_firstname?>" disabled>
</div>
<div class="form-group">
    <label for="post_author">Last Name</label>
    <input type="text" class="form-control" name="user_lastname" value="<?=$user_lastname?>" disabled>
</div>


<div class="form-group">
    <select name="user_role" id="">

<?php 
if($user_role=='Subcriber')
{ 
    echo " <option value='Subcriber' selected disabled>Subcriber</option>";
}else{

    echo " <option value='Admin' selected disabled>Admin</option>";
}

?>


    </select>
</div>

<div class="form-group">
    <label for="post_status">Username</label>
    <input type="text" class="form-control" name="username" value="<?=$username?>" disabled>
</div>

<div class="form-group">
    <label for="post_tags">Email</label>
    <input type="text" class="form-control" name="user_email" value="<?=$user_email?>" disabled>
</div>
<!-- <div class="form-group">
    <label for="post_tags">Password</label>
    <input type="text" class="form-control" name="user_password" value="<?=$user_password?>">
</div> -->

    <input type="submit" class="btn btn-warning" value="Close" name="close_info"  >
</div>
</form>

                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
<?php include 'includes/admin_footer.php';?>