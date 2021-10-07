<?php 
include 'db.php';
session_start();
?>

<?php 
if(isset($_POST['login']))
{
    $username= $_POST['username'];
    $password = $_POST['user_password'];

$username = mysqli_real_escape_string($connection, $username);
$password = mysqli_real_escape_string($connection, $password);


    $query = "SELECT * FROM users WHERE username = '$username'";
    $select_all_user = mysqli_query($connection, $query);
    if(!$select_all_user)
    {
        die("Could not ". mysqli_error_string($connection));
    }
    while($row = mysqli_fetch_array($select_all_user))
    {
        $db_user_id = $row['user_id'];
        $db_username = $row['username'];
        $db_password = $row['user_password'];
        $db_user_firstname = $row['user_firstname'];
        $db_user_lastname = $row['user_lastname'];
        $db_user_role = $row['user_role'];
    }

    $password = crypt($password,$db_password);
   if($db_username == $username && $db_password == $password && $db_user_role =='Admin')
    {

        $_SESSION['username'] = $db_username;
        $_SESSION['firstname'] = $db_user_firstname;
        $_SESSION['lastname'] = $db_user_lastname;
        $_SESSION['role'] = $db_user_role;

        header("Location: ../admin");
    }
        else header("Location: ../index.php");




}



?>