<?php
 include 'config.php';

$conn = new mysqli($dbhost, $dbuser, $dbpassword, $db);
 if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
    $sql = "DELETE FROM `users` WHERE id=".$_GET['id'];
    $result = $conn->query($sql);
    if ($result === TRUE) {
     echo "New record created successfully";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }

$conn->close();
header("Location: table.php");
?>