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
$_SESSION['name']=$_GET['name'];
$_SESSION['l1']=$_GET['l1'];
$_SESSION['l2']=$_GET['l2'];
$_SESSION['l3']=$_GET['l3'];
$_SESSION['l4']=$_GET['l4'];
$_SESSION['l5']=$_GET['l5'];

    $sql = "INSERT INTO Lists(name, l1, l2, l3, l4, l5) Values('".$_SESSION['name']."','".$_SESSION['l1']."','". $_SESSION['l2'] ."','". $_SESSION['l3'] ."','". $_SESSION['l4'] ."','" . $_SESSION['l5']."');";

    if($conn->query($sql)){
      echo "SQL insert success";
    } else {
       echo "SQL insert failure";
    }


$conn->close();
?>


<!-- INSERT INTO Lists(name, l1, l2, l3, l4, l5) VALUES('theirs', 'first', 'second', 'third', 'fourth', 'fifth'); -->
