<?php
$servername = "localhost";
$username = "riobk_UserDB";
$passworddb = "ERICpass.2";
$dbname = "riobk_db25";


// File upload path
$targetDir = "uploads/";
$fileName = basename($_FILES["file"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

//declear what to pick

$firstname= $_POST['firstname'];
$surname= $_POST['surname'];
$email= $_POST['email'];
$phonenumber= $_POST['phonenumber'];
$citystate= $_POST['citystate'];
$zipcode= $_POST['zipcode'];

$file_name= $_POST['file'];


// Create connection
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $passworddb);
    // set the PDO error mode to exception

  // Allow certain file formats
  $allowTypes = array('jpg','png','jpeg','gif','pdf');
  if(in_array($fileType, $allowTypes)){
      // Upload file to server
      if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
$sql = "INSERT INTO tblmembers (firstname,surname,email,phonenumber,address,citystate,zipcode,file_name)
VALUES ($firstname,$surname,$email,$phonenumber,$citystate,$zipcode,$file)";
      $conn->exec($sql);
    }
  header('Location: profile.php');
}

?>
