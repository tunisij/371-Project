<?php session_start(); ?>
<html>
<head></head>
<body>
	<?php
		$_SESSION['title']=$_GET['title'];
		$_SESSION['year']=$_GET['year'];
		$_SESSION['rated']=$_GET['rated'];
		$_SESSION['released']=$_GET['released'];
		$_SESSION['genre']=$_GET['genre'];
		$_SESSION['rating']=$_GET['rating'];

		$conn = new mysqli("cis.gvsu.edu", "id", "pass","db");
		if ($conn->connect_error) {
    		die("Connection failed: " . $conn->connect_error);
		}

		$sql = "INSERT INTO list (title, year, rated, released, genre, rating) VALUES ('" . $_SESSION['title'] . "'," . $_SESSION['year'] . ",'" . $_SESSION['rated'] . "','" . $_SESSION['released'] . "','" . $_SESSION['genre'] . "','" . $_SESSION['rating'] ."');";

		if($conn->query($sql)){
			echo "SQL insert success";
		} else {
			 echo "SQL insert failure";
		}
	?>
</body>
</html>

