<?php
$servername = "localhost";
$username = "rbiobk_UserDB";
$password = "ERICpass.2";
$dbname = "rbiobk_db25";


//declear what to pick

$firstname= $_POST['firstname'];
$surname= $_POST['surname'];
$email= $_POST['email'];
$phonenumber= $_POST['phonenumber'];
$citystate= $_POST['citystate'];
$zipcode= $_POST['zipcode'];



// Create connection
$conn = mysql_connect($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "INSERT INTO tblmembers (firstname,surname,email,phonenumber,address,citystate,zipcode)
VALUES ($firstname,$surname,$email,$phonenumber,$citystate,$zipcode)";

if ($conn->query($sql) === true) {
    header('Location: alert.html');
}

$conn->close();