<?php
 include 'config.php';

$conn = new mysqli($dbhost, $dbuser, $dbpassword, $db);
 if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$return_arr = array();
   $sql = "UPDATE `users` SET `coins`=".$_GET['coin']." WHERE id=".$_GET['id'];
$result = $conn->query($sql);
   if ($result->num_rows > 0) {
      echo"1";
}

$conn->close();
header("Location: table.php");
?>