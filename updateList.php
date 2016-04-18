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
$_SESSION['name']=$_GET['name'];
$_SESSION['l1']=$_GET['l1'];
$_SESSION['l2']=$_GET['l2'];
$_SESSION['l3']=$_GET['l3'];
$_SESSION['l4']=$_GET['l4'];
$_SESSION['l5']=$_GET['l5'];

$sql = "UPDATE Lists SET name='".$_SESSION['name']."',l1='".$_SESSION['l1']."',l2='".$_SESSION['l2']."',l3='".$_SESSION['l3']."',l4='".$_SESSION['l4']."',l5='".$_SESSION['l5']."' WHERE id='$id'";
if ($conn->query($sql) === TRUE) {
  echo '{"success":true}';
} else {
  echo '{"success":false}';
}


$conn->close();
?>
