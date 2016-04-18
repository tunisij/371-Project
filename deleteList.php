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
$_SESSION['id']=$_GET['id'];


    $sql = "DELETE FROM Lists WHERE id=" . $_SESSION['id'] . ";" ;

    if($conn->query($sql)){
      echo '{"success":true}';
    } else {
       echo '{"success":false}';
    }


$conn->close();
?>
