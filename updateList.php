<?php
$servername = "cis.gvsu.edu";
$username = "sinclair";
$password = "sinclair5543";
$dbname =  "sinclair";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$id=$_GET['id'];

$sql = "UPDATE Lists SET name='".$_GET['name']."',l1='".$_GET['l1']."',l2='".$_GET['l2']."',l3='".$_GET['l3']."',l4='".$_GET['l4']."',l5='".$_GET['l5']."' WHERE name='".$_GET['name']."';
if ($conn->query($sql) === TRUE) {
  echo '{"success":true}';
} else {
  echo '{"success":false}';
}


$conn->close();
?>
