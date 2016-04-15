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

    $query=mysqli_query($conn,"SELECT * FROM Lists WHERE name LIKE '%" . $_SESSION['name'] .  "%';");
    $count=mysqli_num_rows($query);
    $rows= array();
    while($r = mysqli_fetch_assoc($query)) {
      $rows[] = $r;
    }

    if ($count>0)
    {
      echo json_encode($rows);
    }
    else
    {
      echo '{"success":false}';
    }


$conn->close();
?>
