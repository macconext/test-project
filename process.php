<?php  
session_start();
// Connect to server and select databse.
 mysqli_connect("localhost","UserDB","password","db25");

// Check connection

if (isset($_POST['login'])){
  
    $userid = $_POST['username'];
    $userpass = $_POST['password'];

    $query = "SELECT * FROM tbladmin WHERE username='$userid' and password='$userpass'";

    $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
    $count = mysqli_num_rows($result);
   
    if ($count == 1){
    $_SESSION['username'] = $userid;

 header('Location: index-profile.php');
}
else {

    header('Location: index.php');
    }
}
?>
