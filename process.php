<?php
require('connect.php');
session_start();
// Connect to server and select databse.

if (isset($_POST['login'])){
    // removes backslashes
$username = stripslashes($_REQUEST['username']);
    //escapes special characters in a string
$username = mysqli_real_escape_string($con,$username);
$password = stripslashes($_REQUEST['password']);
$password = mysqli_real_escape_string($con,$password);
    //3.1.2 Checking the values are existing in the database or not
$query = "SELECT * FROM 'tbladmin' WHERE username='$username' and password='$password'";

$result = mysqli_query($con,$query) or die(mysql_error());
$rows = mysqli_num_rows($result);
if($rows==1){

$_SESSION['username'] = $username;
// Check username and password match
 header('Location: index-profile.php');
}
else {
    // Jump to login page
    header('Location: index.php');
    }
}
?>
