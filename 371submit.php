<<<<<<< HEAD
<?php session_start(); ?>
=======
	<?php session_start(); ?>
>>>>>>> dev
<html>
<head></head>
<body>
	<?php
		$_SESSION['name']=$_GET['name'];
		$_SESSION['l0']=$_GET['l0'];
		$_SESSION['l1']=$_GET['l1'];
		$_SESSION['l2']=$_GET['l2'];
		$_SESSION['l3']=$_GET['l3'];
		$_SESSION['l4']=$_GET['l4'];

		$conn = new mysqli("cis.gvsu.edu", "id", "pass","db");
		if ($conn->connect_error) {
    		die("Connection failed: " . $conn->connect_error);
		}

<<<<<<< HEAD
		$sql = "INSERT INTO list (name, l0, l1, l2, l3, l4) VALUES ('" . $_SESSION['name'] . "'," . $_SESSION['l0'] . "','" . $_SESSION['l1'] . "','" . $_SESSION['l2'] . "','" . $_SESSION['l3'] . "','" . $_SESSION['l4'] ."');";
=======
		$sql = "INSERT INTO list (name, l0, l1, l2, l3, l4) VALUES ('" . $_SESSION['name'] . "','" . $_SESSION['l0'] . "','" . $_SESSION['l1'] . "','" . $_SESSION['l2'] . "','" . $_SESSION['l3'] . "','" . $_SESSION['l4'] ."');";
>>>>>>> dev

		if($conn->query($sql)){
			echo "SQL insert success";
		} else {
			 echo "SQL insert failure";
		}
	?>
</body>
</html>

<<<<<<< HEAD

<!-- CREATE TABLE econ (
id INT NOT NULL AUTO_INCREMENT,
name VARCHAR(100),
option VARCHAR(100),
answer VARCHAR(100),
answerID INT,
PRIMARY KEY( id )
); -->
=======
>>>>>>> dev
