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

    $query=mysqli_query($conn,"SELECT * FROM Lists WHERE name LIKE '%" . $_GET['name'] .  "%';");
    $count=mysqli_num_rows($query);
    $rows= array();
    while($r = mysqli_fetch_row($query)) {
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
